


/*
let butomLogin = document.getElementById("butomLogin");
function showRegister(){
    
    butomLogin.addEventListener("click", ()=>{
        console.log("hola mundos")
        })
    }
*/
   

function showRegister(){
    
    let login = document.getElementById("login");
    let register = document.getElementById("register");
    let butomLogin = document.getElementById("butomLogin");
    
        butomLogin.addEventListener("click", ()=>{
                    register.style.display="block";
                    
                    login.style.display="none"
                    //alert("Estas aqui bb")
            
        })
    }

    function showLogin(){
    
        let login = document.getElementById("login");
        let register = document.getElementById("register");
        let butomRegister = document.getElementById("butomRegister");
        
            butomRegister.addEventListener("click", ()=>{
                      
                    login.style.display="block"
                    
                    register.style.display="none";
                        
                        
                   
                
            })
        }
   