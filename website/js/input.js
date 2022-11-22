let dateInput=document.querySelector("#date");
let amountInput=document.querySelector("#amount");

let dateError=document.createElement('p');
dateError.setAttribute("class","warning");
document.querySelectorAll(".dateField")[0].append(dateError);

let amountError=document.createElement('p');
amountError.setAttribute("class","warning");
document.querySelectorAll(".amountField")[0].append(amountError);

let dateErrorMsg="× Please add Date";
let amountErrorMsg="× Please add Amount.";
let defaultMsg="";

function vaildateDate(){
    let dateValue = dateInput.value;
    if(dateValue !=""){ 
    error = defaultMsg;}
    else {
    error = amountErrorMsg;}
    return error;    
}
function vaildateAmount(){ 
    let amountValue = amountInput.value;
    if(amountValue != 0){ 
    error = defaultMsg;}
    else {
    error = amountErrorMsg;}
    return error;  
}
function validate(){
    let valid = true;//global validation 
    let dateValidation=vaildateDate();
    let amountValidation=vaildateAmount();

    if(dateValidation !==defaultMsg){
        dateError.textContent = dateValidation;
        document.querySelector("#date").classList.add("redborder");
        valid = false;
    }
    if(amountValidation !==defaultMsg){
        amountError.textContent = amountValidation;
        document.querySelector("#amount").classList.add("redborder");
        valid = false;
    }
    return valid;
};

function resetFormError() {
    dateError.textContent=defaultMsg;
    amountError.textContent=defaultMsg;
}
document.form.addEventListener("reset",resetFormError);

dateInput.addEventListener("blur",()=>{ // arrow function
    let x=vaildateDate();
    if(x == defaultMsg){
        dateError.textContent = defaultMsg;
        document.querySelector("#date").classList.remove("redborder");
    }
    });


amountInput.addEventListener("blur",()=>{ // arrow function
    let x=vaildateAmount();
    if(x == defaultMsg){
        amountError.textContent = defaultMsg;
        document.querySelector("#amount").classList.remove("redborder");
    }
    });
