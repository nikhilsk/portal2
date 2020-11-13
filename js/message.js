// const dynamic_render = document.querySelector('.desc');
function fun2(ele)
  {
  var x = document.getElementById("del");
  x.style.display="none";
  
let rno=ele.parentNode.parentNode.rowIndex;
var table = document.getElementById('mytable');
  table.deleteRow(rno-1);
    // table.deleteRow(rno);
    cell.innerHTML=``;
  }

  
const fun3 = (e)=>{
    console.log(e);
    e.innerHTML='';
}
let fun = (ele,x)=>{
// let rno=ele.parentNode.parentNode.rowIndex;
//   var table = document.getElementById('mytable');
//     table.deleteRow(rno-1);
//     console.log(rno);
//     var row = table.insertRow(rno);
//     var cell = row.insertCell(0);
//     send1(x);
//     cell.innerHTML= `<div class="" ><article class="message is-link " id='del'>
//     <div class="message-header">
//       <p>abcd</p>
//       <button class="delete"  onclick="fun3('${cell}')" aria-label="delete"></button>
//     </div>
//     <div class="message-body">
//     <div class="subtitle">Message</div>
//       knvskjdndks${x}
//     </div>
//   </article></div>
  
//   `;
//     cell.colSpan = 7
send1(x);
           
}

let send1 = async (data) => {
    let model = document.getElementById('modal');
    console.log(data);
    fetch(`../php/dummy.php?nameid=${data}`)
      .then((res) => {
        console.log(res);
        return res.json();
      })
      .then((data) => {
        if(data.descrip==null)
        {
          data.descrip="NA";
        }
        if(data.link==null)
        {
          data.link="NA";
        }
        if(data.drive==null)
        {
          data.drive="NA";
        }
        data.category= (data.category)[0].toUpperCase() + (data.category).slice(1);
        model.innerHTML = `
        <div class = "modal-background"></div>
               <div class = "modal-content">
                  <div class = "box">
                     <article class = "media">
                        <div class = "media-content">
                        <article class="message is-link">
                        <div class="message-header">
                          <p>${data.name}- ${data.category}</p>
                        </div>
                        <div class="message-body">
                          <span style="color:#00008B;"><strong>Description: </strong></span>${data.descrip} <br>
                          <span style="color:#00008B;"><strong>Drive Link: </strong></span>${data.drive}<br>
                          <span style="color:#00008B;"><strong>Link: </strong></span>${data.link}
                        </div>
                      </article> 
                        </div>
                     </article>
                  </div>
               </div>
               <button class = "modal-close is-large" aria-label = "close1"></button>
            </div>
        `;
        $(".modal-button").click(function() {
            var target = $(this).data("target");
            $("html").addClass("is-clipped");
            $(target).addClass("is-active");
         });
         
         $(".modal-close").click(function() {
            $("html").removeClass("is-clipped");
            $(this).parent().removeClass("is-active");
         });
      })
      .catch((error) => console.log(error));
  };
