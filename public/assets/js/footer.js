function footer(e){console.log(e);var t=document.getElementById("footer").value;console.log(t),0==t?(document.getElementById("f"+e).style.display="block",document.getElementById("footer").value=e):t==e?(document.getElementById("f"+e).style.display="none",document.getElementById("footer").value=0):(document.getElementById("f"+t).style.display="none",document.getElementById("f"+e).style.display="block",document.getElementById("footer").value=e)}