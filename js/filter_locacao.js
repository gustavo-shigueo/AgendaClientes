const searchBar = document.querySelector('[data-search]')

const rentList = document.querySelector('.rent-body')
const newList  = []
const listElem = document.querySelectorAll('.row')

for (item of listElem) {
    const ID        = item.getAttribute("data-id")
    const name      = item.querySelector('[data-name]').innerText
    const lowerName = name.toLowerCase();
    const date      = item.querySelector('[data-date]').innerText
    const value     = item.querySelector('[data-value]').innerText
    const dimob     = item.querySelector('[data-dimob]').innerText

    newList.push({
        ID: ID,
        nome: name,
        lowerName: lowerName,
        data: date,
        valor: value,
        dimob: dimob
    })
}

const filterResults = arr => {
    rentList.innerHTML = ''
    for (item of arr) {
        const child = `
            <div class=\"row\" data-id=\"${item.ID}\">

                <div class=\"column\" data-name>${item.nome}</div>
                <div class=\"column\" data-date>${item.data}</div>
                <div class=\"column\" data-value>${item.valor}</div>
                <div class=\"column\" data-dimob>${item.dimob}<a href=\"visualizar_locacao.php?id=${item.ID}\"><i class=\"fas fa-caret-right\"></i></a></div>

            </div>`
        rentList.innerHTML += child
    }
    colorCells()
}

searchBar.addEventListener('input', event => {
    const search = event.target.value
    const array  = newList.filter(item =>
        item.lowerName.includes(search.toLowerCase()) ||
        item.data.includes(search)  ||
        item.valor.includes(search) ||
        item.valor.replace(/\W/g, '').includes(search) ||
        item.dimob.toLowerCase().includes(search.toLowerCase()) ||
        item.dimob.toLowerCase().replace('ã', 'a').includes(search.toLowerCase())
    )
    filterResults(array)
})