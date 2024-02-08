import axios from 'axios';


const CheckDomainAvilaplety = (domain) =>
{
  //  console.log(domain);

   return axios.post('api/isDomainAvilable/'+domain)
  .then(function (response) {
    // handle success
    //DomainAvilaplety='the domain is valid'
    //console.log(response);
    return true
  })
  .catch(function (error) {
    // handle error
   // DomainAvilaplety='allready teken'
   return false

    //console.log(error);
  })
  .finally(function () {
    // always executed
  });

};


window.CheckDomainAvilaplety = CheckDomainAvilaplety;