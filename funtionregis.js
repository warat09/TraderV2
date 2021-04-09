//regis
const email = document.getElementById("email")
const password = document.getElementById("password")
const names = document.getElementById("names")
const locations = document.getElementById("locations")
const fileuser = document.getElementById("fileuser")
const username = document.getElementById("username")
const recap1 = document.getElementById("textinput")
const recap2 = document.getElementById('capt')
const tellp = document.getElementById('tell')
const box2 = document.getElementById("one")
const balance = '0'

addBtn.addEventListener('click',(e) => {
    e.preventDefault();
    //const autoId = rootRef.push().key
    return database.ref('/users/'+ username.value).once('value').then((snapshot) => {
        var registerusername = (snapshot.val()&& snapshot.val().username);
        var registeremail = (snapshot.val()&& snapshot.val().email);
        var registerpassword = (snapshot.val()&& snapshot.val().password);
        var registerlocation = (snapshot.val()&& snapshot.val().locations);
        var registername = (snapshot.val()&& snapshot.val().names);
      // ...
      console.log(document.getElementById("one").checked)
      console.log(document.getElementById('password').value.length)
      if(username.value == registerusername || email.value == registeremail){
        window.alert('ไอดีนี้มีแล้ว')
        }
    else if(username.value == '' || names.value == '' || password.value == '' || locations.value == '' || email.value == '' || tellp.value == ''){
        window.alert('กรุณากรอกให้ครบ')
        }
    else if(recap1.value != recap2.value){
        window.alert('กรุณากรอกให้ถูกต้อง')
    }
    else if(recap1.value == ''){
        window.alert('กรุณากรอกให้ครบ')
    }
    else if(!document.getElementById("one").checked){
        window.alert('กรุณาติ๊กข้อมูลความเสี่ยงและข้อตกลงการใช้งานบอท')
    }
    else if(document.getElementById('password').value.length < 8){
        window.alert('ความยาวรหัสผ่านต้องมากกว่าหรือเท่ากับ8ตัว')
    }
    else if(username.value == 'beba' && password.value == 'autobotsigz'){
        window.alert('ไอดีนี้มีแล้ว')
    }
    else{
        database.ref('/users/'+ username.value).set({ 
            username:username.value,
            email:email.value,
            password:password.value,
            name:names.value,
            locations:locations.value,
            phone:tellp.value,
            balance:balance
            
        })
        const emailau = email.value;
        const passwordau = password.value;
    
        //Built in firebase function responsible for signing up a user
        auth.createUserWithEmailAndPassword(emailau, passwordau)
        .then(() => {
            console.log('Signed Up Successfully !');
            //sendVerificationEmail();
        })
        .catch(error => {
            console.error(error);
        })
        window.alert('สมัครเรียบร้อยแล้ว')
        window.open("./login.html")
        
    }
    });
});

function pdf(){
    window.open("ข้อมูลความเสี่ยงและข้อตกลงการใช้งานบอท/ข้อมูลความเสี่ยงและข้อตกลงการใช้งานบอท.pdf")
}