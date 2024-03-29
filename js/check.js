function checkUsername(username){
    
    //Igazat ad vissza, ha a felhasználónév csak számokból, betűkből vagy _-ból áll, egyébként hamisat.
    
    let validChars = new RegExp("^\\w+$");
    return validChars.test(username);
}

function checkPassword(password){

    //Igazat ad vissza, ha a jelszó csak ! és ~ közötti ASCII karakterekből áll és minimum 8 karakter hosszú, egyébként hamisat.

    let validChars = new RegExp("^[!-~]{8,}$");
    return validChars.test(password);
}