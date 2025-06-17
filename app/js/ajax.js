const createForm = document.getElementById("create-form")

if(createForm){
    createForm.addEventListener("submit",function(e){
        e.preventDefault()
        ajax(this)
        this.reset()
    })
}

function toArticle(id){
    window.location.href = "./article/" + id;
}

function ajax(form){
    const data = new FormData(form)
    const method = form.getAttribute("method")
    const action = form.getAttribute("action")
    const headers = new Headers()

    const config = {
        method,
        headers,
        mode:"cors",
        cache:"no-cache",
        body:data
    }

    fetch(action,config)
    .then(res => res.json())
    .then(res => {
        if(res.solution){
            if(res.type === "create"){
                window.location.href = "./admin"
                // rewriteList()
            } else if(res.type === "update"){
                // rewriteList()
            }
        } else {
            alert("¡Hubo un error!")
        }
    })
}

function rewriteList(){
    const lista = document.getElementById("admin-list")

    const action = "./app/logic/read-admin-logic.php"
    const config = {
        method:"POST",
        headers:new Headers(),
        mode:"cors",
        cache:"no-cache"
    }

    fetch(action,config)
    .then(res => res.text())
    .then(html => lista.innerHTML=html)
    .then(() => attachDeleteEvents())
    .catch(err => console.log(err))
}

function attachDeleteEvents() {
    const botones = document.querySelectorAll(".delete-blog")
    if(botones){
        botones.forEach(boton => {
            if(boton){
                boton.addEventListener("click",function(e){

                    const data = new FormData()
                    data.append("id",this.dataset.id)

                    const action = "./app/logic/delete-logic.php"
                    const config = {
                        method:"POST",
                        headers:new Headers(),
                        mode:"cors",
                        cache:"no-cache",
                        body:data
                    }

                    fetch(action,config)
                    .then(res => res.json())
                    .then(res => {
                        if(res.solution){
                            rewriteList()
                        } else {
                            alert(res.text)
                        }
                    })
                })
            }
        })
    }
}

attachDeleteEvents()