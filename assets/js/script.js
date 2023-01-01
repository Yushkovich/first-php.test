$('.btnDelete').on('click', (e) => {
    let element =e.target;
    
    let ID = element.dataset.id;

    location='/delete_user.php?user_id=' + ID;
});