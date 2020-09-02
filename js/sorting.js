const nameTrigger     = document.querySelector('[data-category-name]')
const priorityTrigger = document.querySelector('[data-category-priority]')
const dateTrigger     = document.querySelector('[data-category-date]')

const triggers = [nameTrigger, priorityTrigger, dateTrigger]

const toDoList = document.querySelector('.schedule-body')

const newList  = []
const listElem = document.querySelectorAll('.row')

const priorityLevels = ['Baixa', 'Média', 'Alta']

for (item of listElem){
    const ID       = item.getAttribute("data-id")
    const name     = item.querySelector('[data-name]').innerText
    const priority = item.querySelector('[data-priority]').getAttribute('data-priority')
    const date_old = item.querySelector('[data-date]').innerText

    const date_array = date_old.split('/')

    const date = new Date(date_array[2], date_array[1] - 1, date_array[0])
    
    newList.push({
        ID: ID,
        nome: name,
        prioridade: priority,
        data: date
    })
}

const sort = () => {
    toDoList.innerHTML = ''
    for(item of newList){
        const priorityStr = priorityLevels[Number(item.prioridade)]
        
        const new_day   = item.data.getDate() < 10 ? '0' + item.data.getDate() : item.data.getDate()
        const new_month = item.data.getMonth() < 9 ? '0' + (item.data.getMonth() + 1) : item.data.getMonth() + 1
        const new_year  = item.data.getFullYear()
        const new_date  = new_day + '/' + new_month + '/' + new_year
        
        const child = `
            <div class=\"row\" data-id=\"${item.ID}\">

                <div class=\"column\" data-name>${item.nome}</div>
                <div class=\"column\" data-priority=\"${item.prioridade}\">${priorityStr}</div>
                <div class=\"column\" data-date>${new_date}</div>
                <div class=\"column\" data-finish><a href=\"javascript: if(confirm('Tem certeza de que deseja concluir ${item.nome}?')) location.href='concluir.php?id=${item.ID}'\"><i class=\"fas fa-check\"></i></a></div>

            </div>`
        toDoList.innerHTML += child
    }
    priorityColor()
}


const sortByName = () => {
    newList.sort((a, b) => {
        if(a.nome > b.nome) return 1
        if(a.nome < b.nome) return -1
        return 0
    })
    for(trigger of triggers) trigger.classList.remove('active')
    nameTrigger.classList.add('active')
    sort()
}

const sortByPriority = () => {
    newList.sort((a, b) => b.prioridade - a.prioridade)
    for(trigger of triggers) trigger.classList.remove('active')
    priorityTrigger.classList.add('active')
    sort()
}

const sortByDate = () => {
    newList.sort((a, b) => a.data - b.data)
    for(trigger of triggers) trigger.classList.remove('active')
    dateTrigger.classList.add('active')
    sort()
}

sortByDate()
console.log(newList)

nameTrigger.addEventListener('click', sortByName)
priorityTrigger.addEventListener('click', sortByPriority)
dateTrigger.addEventListener('click', sortByDate)