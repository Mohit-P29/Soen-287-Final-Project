



function getRed(){
    
    let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: #A92B17');
        
    }

    
   
}

function getBlue(){
    
    let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: #367DCF');
        
    }

    
   
}

function getGreen(){
    
    let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: #7FFF00');
        
    }  
   
}

function getPink(){
    
    let outline = document.getElementById('mask-color');
    
    for(j = 0; j < outline.childElementCount; j++){
        
        outline.children[j].setAttribute('style', 'fill: #FFC0CB');
        
    }  
   
}

function getRedOutline(){
    
    let color = document.getElementById('mask_outline');
    
    for(j = 0; j < color.childElementCount; j++){
        
        color.children[j].setAttribute('style', 'fill: #A92B17');
        
            
        
    }
}
    
    function getBlueOutline(){
    
    let color = document.getElementById('mask_outline');
    
    
    for(j = 0; j < color.childElementCount; j++){
        
        color.children[j].setAttribute('style', 'fill: #367DCF');
        
        
        }
    }

 function getGreenOutline(){
    
    let color = document.getElementById('mask_outline');
    
    
    for(j = 0; j < color.childElementCount; j++){
        
        color.children[j].setAttribute('style', 'fill: #7FFF00');
        
        
        }
    }

function getPinkOutline(){
    
    let color = document.getElementById('mask_outline');
    
    
    for(j = 0; j < color.childElementCount; j++){
        
        color.children[j].setAttribute('style', 'fill: #FFC0CB');
        
        
        }
    }

function leftWhite(){
    
let leftH = document.getElementById('left-hole');

 for(j = 0; j < leftH.childElementCount; j++){
        
        leftH.children[j].setAttribute('style', 'fill: #A92B17');
        
    }
}

function rightWhite(){

let rightH = document.getElementById('right-hole');

 for(j = 0; j < rightH.childElementCount; j++){
        
        rightHightH.children[j].setAttribute('style', 'fill: #A92B17');
        
    }

}