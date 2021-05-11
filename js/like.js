
let likeBtns = document.querySelectorAll('.launcher-like')
let userId = document.querySelector('[data-iduser]').getAttribute('data-iduser')
let photoId = document.querySelector('[data-idphoto]').getAttribute('data-idphoto')
console.log(likeBtns);
console.log(userId);
console.log(photoId);
likeBtns.forEach(likeBtn => {
    likeBtn.addEventListener('click',function(e){
        console.log(likeBtn);

       let likeFormData = new FormData
       likeFormData.append('idphoto', e.target.getAttribute('data-idphoto'))
     
       likeFormData.append('iduser', userId)
          fetch('/user/process/insertlike.php',{
           method: 'post',
           body: likeFormData
       })

    })
});


