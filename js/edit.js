const editTrigger = document.querySelector('.title-btn')
const inputList   = document.querySelectorAll('.input-div')
const saveBtn     = document.querySelector('.save')

editTrigger.addEventListener('click', () => {
    saveBtn.getAttribute('type') === 'button' ? saveBtn.setAttribute('type', 'submit') : saveBtn.setAttribute('type', 'button')
    for(input of inputList){
        input.querySelector('.input').toggleAttribute('disabled')
    }
})