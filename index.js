// menu bar togle button
let menu=document.querySelector('#menu-btn');
let navbar=document.querySelector('.nav-bar');
menu.onclick = () => {
	navbar.classList.toggle('active');
	menu.classList.toggle("ri-close-line");
};


// img slider
let s_img=document.querySelectorAll(".slide");
let a=0;
console.log(s_img);
s_img.forEach((img,idx) => {
     img.style.left=`${idx*100}%`;
})
slide = () => {
    s_img.forEach(
        (img)=>{
        img.style.transform = `translateX(-${a*100}%)`;
    })
}
setInterval(()=>{
			a++;
			if(a<s_img.length){
				slide();
				document.getElementById('previous').style.display = "inline-block";
			}
			if(a>=s_img.length-1){
				document.getElementById('next').style.display = "none";
				document.getElementById('previous').style.display = "inline-block";
			}
			if(a==0){
				document.getElementById('previous').style.display="none";
				document.getElementById('next').style.display = "inline-block";
            }
			if(a==s_img.length){
				a=-1;
			}
		},4000)

nxt = () => {
			a++;
			slide();
			if(a>=s_img.length-1){
				document.getElementById('next').style.display = "none"
			}
			else{
				document.getElementById('previous').style.display = "inline-block";
			}
		}
		
prv = () => {
			a--;
			slide();
            if(a==0){
				document.getElementById('previous').style.display="none";
            }
			else{
				document.getElementById('next').style.display = "inline-block";
			}
		}
//  slider ends here 

//fade start
let imgs=document.querySelectorAll('.fade-img');
        let idx=0;
        let bar=document.querySelectorAll('.fade-scbar');
        let txt=document.querySelectorAll('.fade-text');
		fd=()=>{
		for(var i = 0 ; i<imgs.length; i++) {
			imgs[i].style.opacity = 0;
			txt[i].style.opacity = 0;
			bar[i].style.opacity = 0.3;
		}
		idx++;
		if (idx>imgs.length){
			idx = 1;
		}
		imgs[idx-1].style.opacity = 1;
		bar[idx-1].style.opacity = 1;
		txt[idx-1].style.opacity = 1;
	imgs[idx-1].style.transition = '2s';
		}
		setInterval(fd,3000);
		fd();

//fade ends here