
//sidemenu 

let sideMenu = document.querySelector('.sidemenu');
let sideMenuIcon = document.querySelector('.slide-menu-iconbox');

sideMenuIcon.addEventListener('click', ()=> {
    sideMenu.classList.toggle('active');
    sideMenuIcon.classList.toggle('active');
});

//mobile menu 
let mobileProjectBtn = document.querySelector('.mobile-project-menubtn');
let mobileProjectMenulist = document.querySelector('.project-mobile-menu');
let mobileOngoingProjectBtn = document.querySelector('.mobile-ongoing-projectbtn');
let mobileOgoingProjectList = document.querySelector('.mobile-ongoing-project-list');
let mobileUpcomingProjectBtn = document.querySelector('.mobile-upcoming-projectbtn');
let mobileUpcomingProjectList = document.querySelector('.mobile-upcoming-project-list');

mobileProjectBtn.addEventListener('click', ()=> {
    mobileProjectMenulist.classList.toggle('active');

});
mobileOngoingProjectBtn.addEventListener('click', ()=> {
    mobileOgoingProjectList.classList.toggle('active');

});
mobileUpcomingProjectBtn.addEventListener('click', ()=> {
    mobileUpcomingProjectList.classList.toggle('active');

})
// scroll event of menu 

window.onscroll = function() {
    let headMain = document.querySelector(".header-main");
    // let headContainer = document.querySelector('.header-container');
    let scrolledY = document.documentElement.scrollTop;
    // console.log(scrolledY);
    if(scrolledY>30) {
        headMain.classList.add("header-main-manu");
        sideMenu.classList.add('sidemenu-manu');
        // headContainer.classList.add('header-container-manu');
    }else {
        headMain.classList.remove("header-main-manu");
        sideMenu.classList.remove('sidemenu-manu');
        //headContainer.classList.remove('header-container-manu');
        
    };
};







// nri faq 

let nriFaqbox = document.querySelectorAll('.nri-faq-box');



for(i=0; i < nriFaqbox.length; i++) {
    nriFaqbox[i].addEventListener('click', function() {
      this.classList.toggle('active');
 
    });

};




// buyers guide 


let buyerGuideBtn = document.querySelectorAll('.buyers-faqbox');


for(i=0; i < buyerGuideBtn.length; i++) {
    buyerGuideBtn[i].addEventListener('click', function(){
        this.classList.toggle('active');
    });
};



// faq 

let faqsBox = document.querySelectorAll('.faq-box');

for(i=0; i < faqsBox.length; i++) {
    faqsBox[i].addEventListener('click', function() {
      this.classList.toggle('active');
    })
}



// investors tabs 

let investorsNavLinks = document.querySelectorAll('.investors-nav ul li');
let inverstorContent = document.querySelectorAll('.investors-content');

investorsNavLinks.forEach((tab, index) => {
   tab.addEventListener('click', ()=> {
    investorsNavLinks.forEach(tab => {
        tab.classList.remove('active');
    })
    tab.classList.add('active'); 
    inverstorContent.forEach(content => {
        content.classList.remove('active');
    })
    inverstorContent[index].classList.add('active');
   })
});


// access starts here 
let input = document.querySelectorAll('.lead-access input')
let accessBtn = document.querySelector('.access-btn');
let username = document.querySelector('.access-username');
let password = document.querySelector('.access-password');
let errorMsg = document.querySelector('.error-access');
let accessMain = document.querySelector('.lead-access');

// accessBtn.addEventListener('click', ()=> {
//     if(username.value=="skd" && password.value=="skd@123") {
//         accessMain.classList.add('active');
//     }else {
//         errorMsg.innerHTML  = "Please check once Username or Password are not matched";
//         input.forEach(inputs => {
//             inputs.classList.add('active');
//         })
//     }
// });


// document.addEventListener("DOMContentLoaded", function() {
//     // Check if the popup should be displayed
//     if (!localStorage.getItem("popupClosed")) {
//         document.getElementById("popup").style.display = "block";
//     }

//     // Add a click event listener to the "GET ACCESS" button
//     document.getElementById("closePopup").addEventListener("click", function() {
//         if(username.value=="skd" && password.value=="skd@123") {
//         // Hide the popup
//         document.getElementById("popup").style.display = "none";

//         // Store a flag in localStorage to prevent the popup from showing again during this session
//         localStorage.setItem("popupClosed", "true");
//       }else {
//           errorMsg.innerHTML  = "Please check once Username or Password are not matched";
//           localStorage.setItem("popupClosed", "false");
//       }
//     });

//     // To display the popup again after the session has ended, you can clear the localStorage
//     // Uncomment the following line if you want to clear localStorage on each page load
//     //localStorage.removeItem("popupClosed");
// });



accessMain.addEventListener('click', ()=> {
    if(username.value=="skd" && password.value=="skd@123") {
         // Hide the popup
         document.getElementById("popup").classList.add('lead-access-manu');

        // Store a flag in localStorage to prevent the popup from showing again during this session
        let localS = localStorage.setItem("popupClosed", "true");
       }else {
          errorMsg.innerHTML  = "Please check once Username or Password are not matched";
         
    }
  
});
 if(localStorage.getItem("popupClosed")) {
        document.getElementById("popup").classList.add('lead-access-manu');
    }else {
    //   document.getElementById("popup").style.display = "block";
    }
    
    
let logout = document.querySelector('.logout');
logout.addEventListener('click', ()=> {
    localStorage.clear("popupClosed", "true");
    window.location.href = "./leads.php";
   
});