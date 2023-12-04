import{g as d}from"./index-90e6e98f.js";function S(){const e=[".swipe-down-1",".swipe-down-2",".swipe-down-3",".swipe-down-4",".swipe-down-5"],o=[.5,1,1.5,2,2.5];e.forEach((n,r)=>{const t=document.querySelectorAll(n);t.length>0&&d.from(t,{y:-100,opacity:0,duration:1,delay:o[r],ease:"power1.inOut",stagger:.2})})}S();function M(){const e=[".swipe-up-1",".swipe-up-2",".swipe-up-3",".swipe-up-4",".swipe-up-5"],o=[.5,1,1.5,2,2.5];e.forEach((n,r)=>{const t=document.querySelectorAll(n);t.length>0&&d.from(t,{y:-100,opacity:0,duration:1,delay:o[r],ease:"power1.inOut",stagger:.2})})}M();function k(){const e=[".swipe-right-1",".swipe-right-2",".swipe-right-3",".swipe-right-4",".swipe-right-5"],o=[.5,1,1.5,2,2.5];e.forEach((n,r)=>{const t=document.querySelectorAll(n);t.length>0&&d.from(t,{x:-100,opacity:0,duration:1,delay:o[r],ease:"power1.inOut",stagger:.2})})}k();function v(){const e=[".swipe-left-1",".swipe-left-2",".swipe-left-3",".swipe-left-4",".swipe-left-5"],o=[.5,1,1.5,2,2.5];e.forEach((n,r)=>{const t=document.querySelectorAll(n);t.length>0&&d.from(t,{x:100,opacity:0,duration:1,delay:o[r],ease:"power1.inOut",stagger:.2})})}v();const g=document.getElementById("darkModeToggle"),h=document.getElementById("htmlElement"),T=localStorage.getItem("darkMode")==="true";T?y():w();g.addEventListener("change",()=>{g.checked?y():w()});function y(){localStorage.setItem("darkMode","true"),h.classList.add("dark"),document.querySelector(".ri-sun-line").style.display="none",document.querySelector(".ri-moon-line").style.display="inline"}function w(){localStorage.setItem("darkMode","false"),h.classList.remove("dark"),document.querySelector(".ri-moon-line").style.display="none",document.querySelector(".ri-sun-line").style.display="inline"}let f=0;const q=()=>{const e=window.scrollY||window.pageYOffset;e>f?navbar.classList.add("top-[-5rem]"):navbar.classList.remove("top-[-5rem]"),f=e<=0?0:e};window.addEventListener("scroll",q);function b(){const e=document.getElementById("profileThumbnail"),o=document.getElementById("dropProfile");let n=!1;e.addEventListener("click",()=>{n?(d.to(o,{x:"100%",duration:.5,ease:"power2.inOut",opacity:0}),n=!1):(o.classList.remove("hidden"),d.to(o,{x:0,duration:.5,ease:"power2.inOut",opacity:1}),n=!0)})}document.addEventListener("DOMContentLoaded",b);function B(){document.querySelector(".open-modal-add").addEventListener("click",function(){const o=this.getAttribute("data-target"),n=document.getElementById("floatingModal"),r="/add/"+o;fetch(r).then(t=>t.text()).then(t=>{n.innerHTML=t;const c=document.querySelector(".modalFormAll");document.querySelector(".close-modal-add").addEventListener("click",function(){c.classList.add("top-[-20rem]","duration-500","opacity-0"),setTimeout(()=>{n.innerHTML=""},300)})}).catch(t=>{console.error("Terjadi kesalahan saat mengambil form penambahan.")})})}document.addEventListener("DOMContentLoaded",B);function L(){document.querySelectorAll(".open-modal-changes").forEach(function(o){o.addEventListener("click",function(){const n=this.getAttribute("data-id"),r=this.getAttribute("data-target"),t=document.getElementById("floatingModal"),c="/edit/"+n+"/"+r;fetch(c).then(a=>a.text()).then(a=>{t.innerHTML=a;const s=document.querySelector(".modalFormAll");document.querySelector(".close-modal-changes").addEventListener("click",function(){s.classList.add("top-[-10rem]","duration-500","opacity-0"),setTimeout(()=>{t.innerHTML=""},300)})}).catch(a=>{console.error("Terjadi kesalahan saat mengambil form pengeditan.")})})})}document.addEventListener("DOMContentLoaded",L);function E(){document.querySelectorAll(".open-modal-delete").forEach(function(o){o.addEventListener("click",function(){const n=this.getAttribute("data-id"),r=this.getAttribute("data-target"),t=document.getElementById("floatingModal"),c="/delete/"+n+"/"+r;fetch(c).then(a=>a.text()).then(a=>{t.innerHTML=a;const s=document.querySelector(".modalFormAll");document.querySelector(".close-modal-delete").addEventListener("click",function(){s.classList.add("top-[-10rem]","duration-500","opacity-0"),setTimeout(()=>{t.innerHTML=""},300)})}).catch(a=>{console.error("Terjadi kesalahan saat mengambil form penghapusan.")})})})}document.addEventListener("DOMContentLoaded",E);function O(){const e=document.getElementById("chooseTbody"),o=document.querySelector(".inputSearch"),n=document.querySelector("#categoryItem");o.addEventListener("keyup",function(r){if(r.key==="Enter"){const t=o.value,c=n.value;fetch("/searching?query="+t+"&category="+c).then(function(a){if(!a.ok)throw new Error("Network response was not ok");return a.text()}).then(function(a){const s=document.createElement("div");s.innerHTML=a;const u=s.querySelector("#chooseTbody");e.innerHTML=u.innerHTML;const p=document.createElement("script");p.innerHTML=[E()||L()],document.body.appendChild(p)}).catch(function(a){console.error("There has been a problem with your fetch operation:",a)})}})}document.addEventListener("DOMContentLoaded",O);const i=document.querySelector(".inputSearch"),l=document.querySelector("#categoryItem");let m=["opacity-100","w-80","pl-10","pr-[4.5rem]","cursor-text"];i.addEventListener("click",function(e){l.classList.remove("hidden"),i.classList.add(...m),e.stopPropagation()});l.addEventListener("click",function(e){i.classList.add(...m),e.stopPropagation()});document.addEventListener("click",function(e){!i.contains(e.target)&&!l.contains(e.target)&&(l.classList.add("hidden"),i.classList.remove(...m))});
