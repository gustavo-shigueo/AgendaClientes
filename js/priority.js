const priorityColor = () => {
    const listItems = document.querySelectorAll("[data-priority]")
    for(item of listItems){
        const level = Number(item.getAttribute("data-priority"))
        let color
        if(level === 0)      color = 'rgba(153,239,68,0.73)'
        else if(level === 1) color = '#efef33bb'
        else color = '#ff3434bb'
        item.style.backgroundColor = color
    }
}

priorityColor()