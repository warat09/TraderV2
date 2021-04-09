const mailField = document.getElementById('mail');
const labels = document.getElementsByTagName('label');
const resetPassword = document.getElementById('resetPassword');
//const successModal = document.querySelector('.success');
//const failureModal = document.querySelector('.failure');

const auth = firebase.auth();

//auth.languageCode = 'DE_de';

auth.useDeviceLanguage();

const resetPasswordFunction = () => {
    const email = mailField.value;

    auth.sendPasswordResetEmail(email)
    .then(() => {
        console.log('Password Reset Email Sent Successfully!');
    })
    .catch(error => {
        console.error(error);
    })
}


resetPassword.addEventListener('click', resetPasswordFunction);

