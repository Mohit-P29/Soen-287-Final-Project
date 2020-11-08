let stateArray = ['Layer_1','top_right','bottom_left','bottom_right','top_left'];

let resultOne = [0,1,1,1,1];
let resultTwo = [1,0,0,0,0];

function getResultOne(){
    
    changeColors(resultOne);
}

function getResultTwo(){
    
    changeColors(resultTwo);
}

function changeColors(arrayNumber){
    
    for(i = 0; i < stateArray.length; i++ ){
        
        let stateElement = document.getElementById(stateArray[i]);
        
        for(j = 0; j < stateElement.childElementCount; j++){
        
            if(arrayNumber[i]){
                
                stateElement.children[j].setAttribute('style', 'fill: #367DCF')
                
            } else {
                
                 stateElement.children[j].setAttribute('style', 'fill: #A92B17')
                
            }
        
        
        }
    }
}