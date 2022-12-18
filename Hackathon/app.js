var lg=document.querySelector("#lg");
var lgwin=document.querySelector("#lgwin");
var formlg=document.querySelector("#form-lg");
lg.addEventListener("click",function(){
    formlg.style.display="grid";
    lgwin.style.backdropFilter="blur(5px)";
})
var close=document.querySelector("#cls");
close.addEventListener("click",function(){
    formlg.style.display="none";
    lgwin.style.backdropFilter="";
})

sc=[
    {
      scname:"Ration Card",
      e:["The total income of a family should be less than Rs. 10,000 per month and Rs. 12,000/- per month in rural and urban areas respectively.","The monthly electricity consumption of the beneficiary must be less than 300 units.","The total land holding of the family should be less than 3 acres of wetland or 10 acres of dry land or 10 acres of both wet and dry land together.","No family member should be a pensioner or Government employee. All sanitary workers are exempted from this.","The family should not own any four-wheeler (Auto, Taxi and Tractors are exempted.","The beneficiary family should not be owing to any property or less than 750 square feet of built-up area in an Urban area."],
      req:["Proof of address.","Proof of identity.","Proof of income.","Photographs."]  
    },
    {
      scname:"Housing Scheme",
      e:["People living in urban areas with annual income level 1,44,000 and the people living in rural areas with annual income below 1,20,000 are eligible under this scheme.","Only the people who are holding the white ration card benefit under this scheme.","A person holding a government job in the family or a person living with the pension provided by the government will not fall under this scheme.","A person having his own four-wheeler vehicle will not fall under this program.","Any person in the family paying income tax doesn’t come under this scheme.","The applicants consuming less than 300 units of power monthly are eligible for this scheme.","Should be a permanent resident of the state of Andhra Pradesh."],
      req:["Aadhar card.","Bank account passbook.","Address proof.","Income certificate.","Domicile certificate.","Photograph of the applicant.","Mobile number."]
    },
    {
        scname:"Jagan Anna Vidya Deevena",
        e:["the fee of students belonging to Scheduled Castes, Scheduled Tribes, backward classes, minorities, Kapus, economically backward classes and differently-abled categories will be reimbursed.","Any student whose annual family income is less than Rs. 2.5 lakh are eligible under Jagananna Vidya Deevena Scheme.","Those with 10 acres of wetland and 25 acres of dry land are also eligible for the benefit.","the income taxpayers will not be eligible."],
        req:["Domicile certificate","Aadhar card","Voter ID card","College admission certificate","Admission fee receipt","Non-tax paying declaration","Account details of any Bank","Occupational details of parents","Passport size photograph"]
    }
]

var schemes=document.querySelector("#schemes");
var s="";
sc.forEach(i=>{
    s+=`<div class="scheme">
            <h2>${i.scname}</h2>
            <div>
                <h3>Eligibility Criteria:</h3>
                <ul>`
    i.e.forEach(j=>{
        s+=`<li>${j}</li>`
    })
    s+=`</ul><h3>Required Documents</h3>
                <ul>`
                
    i.req.forEach(j=>{
        s+=`<li>${j}</li>`
    })
    s+=`</ul>
            </div>
        </div>`
                
})

schemes.innerHTML=s;
