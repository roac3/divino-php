inputFiles = document.querySelectorAll(".inputimg");
imgInput = document.querySelectorAll('.showimginput');

for( let i = 0; i < inputFiles.length; i++){
    inputFiles[i].addEventListener('change',()=>{
        
        let reader = new FileReader();
        reader.readAsDataURL(inputFiles[i].files[0]);

        reader.onload = () =>{
            imgInput[i].setAttribute("src", reader.result);
        }
        
    })
}