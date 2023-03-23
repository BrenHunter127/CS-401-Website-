function adjustFooter() {
    const footer = document.querySelector('footer');
    const loadMoreButton = document.querySelector('#load-more');

    if (loadMoreButton) {
      const loadMoreButtonRect = loadMoreButton.getBoundingClientRect();
      footer.style.top = `${loadMoreButtonRect.bottom + 0}px`;
    } else {
      const mainContent = document.querySelector('.main-content');
      footer.style.top = `${mainContent.offsetHeight}px`;
    }
  }

  window.addEventListener('load', adjustFooter);
  window.addEventListener('resize', adjustFooter);