"use strict";var close_btn=document.getElementById("noclose"),modal=document.getElementById("warning"),modal_center=document.getElementsByClassName("center")[0],close=function close(){modal.classList.add("displayNone")};close_btn.addEventListener("click",close),modal.addEventListener("click",(function(e){e.target.classList.contains("target")||close()}));