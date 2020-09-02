const colorCells = () => {
    const cells = document.querySelectorAll("[data-dimob]")
    for (cell of cells) cell.style.backgroundColor = cell.innerText === 'Sim' ? 'rgba(153,239,68,0.73)' : 'rgba(255,52,52,0.73)'
}

colorCells()