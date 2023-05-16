console.log("sdasda");
const input = document.getElementsByClassName(".name");
 input.addEventListener("keypress",function(event){
const charCode =event.which ||event.keyCode;
const charstr = string.formCharCode(charCode);

const replaceChars={
    "ç":"c",
    "ğ":"g",
    "ı":"i",
    "ö":"o",
    "ş":"s",
    "ü":"u"
}
const replacedChar=replaceChars[charstr.toLowerCasr()];
if(replacedChar){
    event.preventDefult();
    input.value +=replacedChar;
}
 })
