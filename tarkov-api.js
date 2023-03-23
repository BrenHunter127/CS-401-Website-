let currentPage = 1;
let currentSearchTerm = '';
let allItems = [];

// Function to fetch data from the Tarkov API
// async function fetchAllData() {
//   const fleaMarketPrices = await fetchFleaMarketPrices();

//   const apiUrl = 'tarkov-proxy.php';
//   const response = await fetch(apiUrl);
//   const data = await response.json();

//   const updatedItems = data.data.items.map((item) => {
//     const fleaMarketPrice = fleaMarketPrices.find((price) => price.id === item.id); // Change this line
//     return {
//       ...item,
//       avg24hPrice: fleaMarketPrice ? fleaMarketPrice.avg : 0, // Change this line
//     };
//   });

//   return updatedItems;
// }


//Code that works for sell to flea column
async function fetchAllData() {
  const apiUrl = `tarkov-market-proxy.php?all=true`;
  const response = await fetch(apiUrl);
  const data = await response.json();

  return data.error ? [] : data;
}


async function fetchFleaMarketPrices() {
  const response = await fetch('tarkov-market-proxy.php?prices=true'); // Change this line
  const data = await response.json();
  return data.error ? [] : data;
}

// Fetch data and display it in the table
async function displayData(loadMore = false, items) {
  const table = document.querySelector('#table-container table');
  const tbody = table.querySelector('tbody');

  // Clear the existing table body
  if (!loadMore) {
    tbody.innerHTML = '';
  }

   console.log(items);
  // Fill table body with data
  items.forEach(item => {
    console.log(item);
      let row = document.createElement('tr');

    // Image column
    let imgCell = document.createElement('td');
    let img = document.createElement('img');

    // Code for the Tarov.dev img API calls
    // img.src = 'https://assets.tarkov.dev/' + item.id + '-icon.webp'; 

    img.src = item.icon; // tarkov market img api call 
    img.width = 60;
    img.height = 60;
    imgCell.appendChild(img);
    row.appendChild(imgCell);

    // Name column
    let nameCell = document.createElement('td');
    nameCell.textContent = item.name;
    row.appendChild(nameCell);

    const bestTrader = findBestTrader(item);
    // Sell to Trader column
    let traderPriceCell = document.createElement('td');
    traderPriceCell.textContent = bestTrader.price;
    row.appendChild(traderPriceCell);

    // Sell to Flea column
    let fleaPriceCell = document.createElement('td');
  fleaPriceCell.textContent = item.avg24hPrice;
  row.appendChild(fleaPriceCell);


    // Profit Column
    let profitCell = document.createElement('td');
    profitCell.textContent = item.avg24hPrice - bestTrader.price;
    row.appendChild(profitCell);


    tbody.appendChild(row);
  });
}

async function fetchSalesHistory(itemId) {
  const response = await fetch(`https://tarkov-market.com/api/v1/item/history/${itemId}`);
  const data = await response.json();
  return data.data;
}

function findBestTrader(item) {
  if (!item) return { traderName: null, price: 0, currency: '' };

  // There is only one trader available for each item in this structure
  return {
    traderName: item.traderName,
    price: item.traderPrice,
    currency: item.traderPriceCur,
  };
}


// Tarkov.dev api code for sell to trader
// function findBestTrader(item) {
//   if (!item || !item.traderPrices) return { traderName: null, price: 0, currency: '' };

//   let bestTrader = null;
//   let maxPrice = 0;
//   let currency = '';

//   item.traderPrices.forEach(traderPrice => {
//     if (traderPrice.price > maxPrice) {
//       maxPrice = traderPrice.price;
//       bestTrader = traderPrice.trader.name;
//       currency = traderPrice.currency;
//     }
//   });

//   return {
//     traderName: bestTrader,
//     price: maxPrice,
//     currency: currency,
//   };
// }

// filtering function to filter items by the selected trader
function filterItemsByTrader(items, traderName) {
  return items.filter(item => {
    const bestTrader = findBestTrader(item);
    return bestTrader.traderName === traderName;
  });
}

// sorting function to sort items by price in descending order
function sortByPrice(items) {
  return items.sort((a, b) => {
    const bestTraderA = findBestTrader(a);
    const bestTraderB = findBestTrader(b);
    return bestTraderB.price - bestTraderA.price;
  });
}


function filterItems(items, searchTerm) {
  return items.filter(item => item.name.toLowerCase().includes(searchTerm.toLowerCase()));
}

function debounce(fn, delay) {
  let timeoutID = null;
  return function (...args) {
    clearTimeout(timeoutID);
    timeoutID = setTimeout(() => fn.apply(this, args), delay);
  };
}

// Randomly display items from database upon loading page or page refresh.
function shuffleItems(items) { 
  for (let i = items.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [items[i], items[j]] = [items[j], items[i]];
  }
}


// filtering function for item categories dropdown menu
function filterItemsByCategory(items, categoryName) {
  const categoryKeywords = {
    'Headsets': ['headset'],
    'Helmets': ['helmet', 'mask', 'beanie'],
    'Glasses': ['glasses', 'goggles', 'face shield', 'visor'],
    'Armors': ['armor', 'plate carrier'],
    'Rigs': ['rig', 'vest', 'plate carrier'],
    'Backpacks': ['backpack', 'bag'],
    'Guns': ['rifle', 'pistol', 'shotgun', 'sniper', 'gun', 'carbine', 'cartridge'],
    // Mods filter definitely not perfect
    'Mods': ['handguard', 'magazine', 'foregrip', 'flashlight', 'dovetail', 'hider', 'rangefinder', 'interface', 'sight', 'scope', 'rail', 'suppressor', 'muzzle', ''],
    'Pistol Grips': ['pistol grip', 'side grip'],
    'Suppressors': ['suppressor', 'silencer'],
    'Grenades': ['Flash Bang grenade', 'hand grenade', 'smoke grenade', 'stun grenade'],
    'Containers': ['case', 'wallet', 'junk box', 'key tool', 'gingy keychain', 'thermal bag'],
    'Keys': ['key'],
    'Provisions': ['can of', 'pack of', 'bottle', 'crackers', 'croutons', 'chocolate', 'jar', 'canister']
  };

  const keywords = categoryKeywords[categoryName];

  if (!keywords) {
    return items;
  }

  return items.filter(item => {
    const itemName = item.name.toLowerCase();
    return keywords.some(keyword => itemName.includes(keyword));
  });
}

document.addEventListener('DOMContentLoaded', async () => {
  allItems = await fetchAllData();
  shuffleItems(allItems);
  displayData(false, allItems.slice(0, 50));
});

document.querySelector('#load-more').addEventListener('click', async () => {
  currentPage++;
  const startIndex = (currentPage - 1) * 50;
  const endIndex = startIndex + 50;
  if (currentSearchTerm === '') {
    displayData(true, allItems.slice(startIndex, endIndex));
  } else {
    const filteredItems = filterItems(allItems, currentSearchTerm);
    displayData(true, filteredItems.slice(startIndex, endIndex));
  }
});

document.querySelector('#search-box input').addEventListener('keyup', debounce(async (event) => {
  currentSearchTerm = event.target.value;
  if (currentSearchTerm === '') {
    displayData(false, allItems.slice(0, 50));
  } else {
    const filteredItems = filterItems(allItems, currentSearchTerm);
    displayData(false, filteredItems);
  }
}, 300));

// Event listener for dropdown menu trader.
document.querySelector('#trader-menu').addEventListener('change', async (event) => {
  const selectedTrader = event.target.value;
  let filteredItems;

  if (selectedTrader === 'all') {
    filteredItems = allItems;
  } else {
    filteredItems = filterItemsByTrader(allItems, selectedTrader);
  }

  if (currentSearchTerm !== '') {
    filteredItems = filterItems(filteredItems, currentSearchTerm);
  }

  const sortedItems = sortByPrice(filteredItems);
  displayData(false, sortedItems);
});


document.querySelector('#item-menu').addEventListener('change', async (event) => {

  const selectedItemCategory = event.target.value;
  let filteredItems;

  if (selectedItemCategory === '') {
    filteredItems = allItems;
  } else {
    filteredItems = filterItemsByCategory(allItems, selectedItemCategory);
  }

  if (currentSearchTerm !== '') {
    filteredItems = filterItems(filteredItems, currentSearchTerm);
  }

  const sortedItems = sortByPrice(filteredItems);
  displayData(false, sortedItems);
});
