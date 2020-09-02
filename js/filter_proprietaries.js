const searchBar = document.querySelector('[data-search]')

const clientList = document.querySelector('.proprietary-body')
const newList = []
const listElem = document.querySelectorAll('.row')

for (item of listElem) {
    const ID = item.getAttribute("data-id")
    const name = item.querySelector('[data-name]').innerText
    const lowerName = name.toLowerCase();
    const phone = item.querySelector('[data-tel]').innerText
    const cpf = item.querySelector('[data-cpf]').innerText

    newList.push({
        ID: ID,
        nome: name,
        lowerName: lowerName,
        fone: phone,
        cpf: cpf
    })
}

const filterResults = arr => {
    clientList.innerHTML = ''
    for (item of arr) {
        const child = `
            <div class=\"row\" data-id=\"${item.ID}\">

                <div class=\"column\" data-name>${item.nome}</div>
                <div class=\"column\" data-phone>${item.fone}</div>
                <div class=\"column\" data-cpf>${item.cpf}<a href=\"visualizar_proprietario.php?id=${item.ID}\"><i class=\"fas fa-caret-right\"></i></a></div>

            </div>`
        clientList.innerHTML += child
    }
}

searchBar.addEventListener('input', event => {
    const search = event.target.value
    const array  = newList.filter(item =>
        item.lowerName.includes(search.toLowerCase()) ||
        item.fone.includes(search) ||
        item.fone.replace(/\W/g, '').includes(search) ||
        item.cpf.includes(search) ||
        item.cpf.replace(/\W/g, '').includes(search)
    )
    console.log(array)
    filterResults(array)
})