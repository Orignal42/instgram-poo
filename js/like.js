
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
          fetch('/Instageek/user/process/insertlike.php',{
           method: 'post',
           body: likeFormData
       })

    })
});

// let likeBtns = document.querySelectorAll('.launcher-like')
// let userId = document.querySelector('[data-idUser]').getAttribute('data-idUser')

// likeBtns.forEach(likeBtn => {
//     likeBtn.addEventListener('click',function(e){

//        let likeFormData = new FormData
//        likeFormData.append('id_photo', e.target.getAttribute('data-idphoto'))
//        likeFormData.append('id_user', userId)


//        fetch('/Users/process/like.php',{
//            method: 'post',
//            body: likeFormData
//        }).then(()=>{
//            refreshLike(e.target.getAttribute('data-idphoto'))
//        })
//     })
// });

// function refreshLike(idPhoto){
//     formData = new FormData()
//     formData.append('id',idPhoto)
//     fetch('/Users/process/getLikedPhoto.php',{
//         method:'post',
//         body:formData
//     }).then((response)=>{
//         return response.json()
//     }).then((data)=>{
//         console.log(data);
//         document.querySelector('.nb_like').innerHTML = data.nb_like
//     })
// }

