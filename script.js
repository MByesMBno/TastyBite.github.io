function openForm(get_id) {
    document.getElementById(get_id).style.display = "block";
  }
  
  function closeForm(get_id) {
    document.getElementById(get_id).style.display = "none";
  }

  function check(name_of_id, id_two){
    
    let current=document.getElementById(id_two);
    let gone=document.getElementById(name_of_id);
    if(current){
        gone.style='opacity:1;left:66%';
        current.style="opacity:0;"; 
        
    }
    
  }

  function unlike(name_of_id, id_two){
    let event=document.getElementById(name_of_id);
    let NEW=document.getElementById(id_two);

    if(event){
      
      event.style='opacity:0;left:80%';
      NEW.style='opacity:1;';
    }
  }


  
  window.onscroll = function(){scrollFunction()};

  function scrollFunction(){

    let scrollPos=100;
    let header=document.querySelector('.header');
    let form1=document.querySelector('.form-container');
    
    if(document.body.scrollTop > scrollPos || document.documentElement.scrollTop > scrollPos){
      header.classList.add('newheader');
      form1.classList.add('newformcontainer');
      
    }else{
      header.classList.remove('newheader');
      form1.classList.remove('newformcontainer');
      
    }

  }
 