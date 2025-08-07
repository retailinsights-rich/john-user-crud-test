import './bootstrap';
import { createApp } from 'vue'

//const { createApp } = Vue;
createApp({
    data() {
        return {
            userUsernameErrHandling: "",
            userFirstNameErrHandling: "",
            userMiddleNameErrHandling: "",
            userLastNameErrHandling: "",
            userEmailAddressErrHandling: "",
            userPhoneNumberErrHandling: "",
        }
    }, methods: {
        userUsernameErrHandlingFunc(event) {
            if(event.target.value.length < 5){
                this.userUsernameErrHandling = "Your username must be at least 5 characters!"
            } else {
                this.userUsernameErrHandling = ""
            }
        },
        userFirstNameErrHandlingFunc(event) {
            if(event.target.value.length < 1){
                this.userFirstNameErrHandling = "Your first name must not be blank!"
            } else {
                this.userFirstNameErrHandling = ""
            }
        },
        userLastNameErrHandlingFunc(event) {
            if(event.target.value.length < 1){
                this.userLastNameErrHandling = "Your last name must not be blank!"
            } else {
                this.userLastNameErrHandling = ""
            }
        },
        userEmailAddressErrHandlingFunc(event) {
            if(event.target.value.length < 1){
                this.userEmailAddressErrHandling = "Your email address must not be blank!"
            } else {
                this.userEmailAddressErrHandling = ""
            }
        },
        userPhoneNumberErrHandlingFunc(event) {
            if(event.target.value.length < 1){
                this.userPhoneNumberErrHandling = "Your phone number must not be blank!"
            } else {
                this.userPhoneNumberErrHandling = ""
            }
        }
    }
}).mount('#user_create_form');