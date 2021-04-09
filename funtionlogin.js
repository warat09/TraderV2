//login
const loginusername = document.getElementById("loginusername")
const loginpassword = document.getElementById("loginpassword")

const database = firebase.database()

Btlogin.addEventListener('click',(e) => {
    e.preventDefault();
    //const autoId = rootRef.push().key
    return database.ref('/users/' + loginusername.value).once('value').then((snapshot) => {
    var username = (snapshot.val()&& snapshot.val().username);
    var password = (snapshot.val() && snapshot.val().password);
  // ...
  console.log(username)
  console.log(password) 
    if(loginusername.value == username && loginpassword.value == password){
        window.open("./Admin3/profile.html")
    }
    else{
        return database.ref('/admin/').once('value').then((snapshot) => {
            var adminusername = (snapshot.val()&& snapshot.val().username);
            var adminpassword = (snapshot.val() && snapshot.val().password);
          // ...
          
            if(loginusername.value == adminusername && loginpassword.value == adminpassword){
                window.open("./Admin3/admin.html")
            }
            else{
                window.alert('ชื่อผู้ใช้หรือพาสเวริด์ผิด!!')
            }
        });
    }
});
});
/*Btlogin.addEventListener('click',(e) => {
    e.preventDefault();
    //const autoId = rootRef.push().key
    return database.ref('/admin/').once('value').then((snapshot) => {
    var adminusername = (snapshot.val()&& snapshot.val().adminusername);
    var adminpassword = (snapshot.val() && snapshot.val().adminpassword);
  // ...

    if(loginusername.value == adminusername && loginpassword.value == adminpassword){
        window.open("./register.html")
    }
    else{
        window.alert('อีเมล์หรือพาสเวริด์ผิด!!')
    }
});
});*/

