window.onload = (event) => {
    //console.log(document.cookie);
    let button = document.getElementById("submit")
    let input = document.getElementById("domainname");
    let token = document.getElementById("csrf");
    let data = document.getElementById("data");
    let map = document.getElementById('map');
    let panel = document.getElementById("drop");
    let arrow = document.getElementById("triangle");
    let buf = 0;
    panel.addEventListener("click", ()=>{
        buf+=1;
        if(buf%2==1) {
            map.style.display = "block";
            map.style.animationName = "mapdrop";
            map.style.animationDuration = "2s";
            arrow.style.animationName = "triangleup";
            arrow.style.animationDuration = "2s";
        }
        else{
            //map.style.animationDirection = "reverse";
            map.style.display = "block";
            map.style.animationName = "hidemap";
            map.style.animationDuration = "2s";
            //arrow.style.animationDirection = "reverse";
            arrow.style.animationName = "triangledown";
            arrow.style.animationDuration = "2s";
        }
    })
    button.onclick = () => {
        map.src = "https://www.google.com/maps/embed/v1/view?key=AIzaSyA4RAU7uU1PWBxU-0JwofEKLkA1Yo3TEMQ";
        //console.log(window.sessionStorage);
        $.ajax({
            url:"/test",
            method:"POST",
            dataType:"json",
            headers:{
              "my-token":token.value
            },
            data:{
                "domain":input.value
            },
             responseType:"json",
            success: (response)=>{
                console.log(response);
                window.location.hash = response.domainname;
                map.src += "&" + response.googlelocation;
                for(variable in response.all.WhoisRecord.administrativeContact){
                    console.log(variable);
                }
            },
            error: (jq, e)=>{
                console.log(e + " "+jq);
            }
        })
        //request to controller
    }
};