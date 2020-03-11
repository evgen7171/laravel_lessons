class ChangePasswordForm {

    constructor() {
        this.checkbox = document.getElementById('changePassword');
        this.passwordInput = document.getElementById('password');
        this.confirmInput = document.getElementById('confirm');
        this.newPassworddInput = document.getElementById('newPassword');

        if (this.checkbox) {
            this.handle();
        }
    }

    handle() {
        this.checkbox.checked = true;
        this.checkbox.addEventListener('click', () => {
            console.log(1);
            // this.passwordInput.setAttribute('disabled',this.check.value);
        });
        // if (this.check) {
        //     this.passwordInput.setAttribute('disabled','disabled');
        // }
    }

}

const changePasswordForm = new ChangePasswordForm();
