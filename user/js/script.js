function validateForm() {
    let firstName = document.getElementById('f_name').value;
    let lastName = document.getElementById('l_name').value;
    let email = document.getElementById('email').value;
    let mobile = document.getElementById('mob_number').value;
    let password = document.getElementById('password').value;

    let error = '';

    if (firstName.length < 3) {
        error = 'Error : First name length should be min 3 characters';
        document.getElementById('f_name').focus();
        document.getElementById('errors').innerHTML = "<span style='color:red'>" + error + "</span>"
        return false;
    }
    else if (lastName.length < 3) {
        error = 'Error : Last name length should be min 3 characters';
        document.getElementById('l_name').focus();
        document.getElementById('errors').innerHTML = "<span style='color:red'>" + error + "</span>"
        return false;
    }
    else if (validateEmail(email) === false) {
        error = 'Error : Enter a valid gmail address';
        document.getElementById('email').focus();
        document.getElementById('errors').innerHTML = "<span style='color:red'>" + error + "</span>"
        return false;
    }
    else if (validateMobile(mobile) === false) {
        error = 'Error : Enter a valid mobile number';
        document.getElementById('mob_number').focus();
        document.getElementById('errors').innerHTML = "<span style='color:red'>" + error + "</span>"
        return false;
    }
    else if (validatePassword(password) === false) {
        error = 'Error : Password should have min length of 8 characters, 1 block letter, 1 special character and 1 number'
        document.getElementById('password').focus();
        document.getElementById('errors').innerHTML = "<span style='color:red'>" + error + "</span>"
        return false;
    }
    else {
        error = ''
        document.getElementById('errors').innerHTML = "<span style='color:red'>" + error + "</span>"
        return true;
    }

}

function validatePassword(password) {
    var re = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
    return re.test(String(password).toLowerCase());
}

function validateMobile(mobile) {
    var re = /^\+(?:[0-9] ?){6,14}[0-9]$/;
    return re.test(String(mobile))
}

function validateEmail(email) {
    var re = /^[a-z0-9](\.?[a-z0-9]){5,}@g(oogle)?mail\.com$/;
    return re.test(String(email).toLowerCase());
}

function getBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = error => reject(error);
    });
}

async function handleProfile(uploader) {
    let url = '';
    if(uploader.files[0].size > 2000000) {
        alert('Profile image size should be less than 2 MB!')
        return;
    }
    await getBase64(uploader.files[0]).then(res => {
        url = res
    })
    document.getElementById('profileImage').setAttribute('src', url)
}