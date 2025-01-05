const profile = document.querySelector(".profile");
const menuprofile = document.querySelector(".list-menu");

console.log(profile,menuprofile);




profile.addEventListener("click",function(){
    if(menuprofile.style.display == "block")
    {
        menuprofile.style.display = "none";
    }
    else
    {
        menuprofile.style.display = "block";
    }
})