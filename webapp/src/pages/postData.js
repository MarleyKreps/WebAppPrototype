export function PostData(type, userData) {
    let baseUrl = "165.227.191.245:3000";
    //console.log(userData);
    console.log(userData.email+userData.password);
    return new Promise((resolve, reject){
        fetch(baseUrl + type, {
            method: 'POST',
            body: JSON.stringify(userData.email + userData.password)
        })
            .then((response) => response.json())
            .then((responseJson) => {
                resolve(responseJson.ourInfoHere);
            })
            .catch((error) => {
                reject(error);
            })
    });
}