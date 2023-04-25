
var dict = {};
dict.firstName = { 'active': false, 'title': 'First Name', 'textValue': '' };
dict.lastName = { 'active': false, 'title': 'Last Name', 'textValue': '' };
dict.address = { 'active': false, 'title': 'Address', 'textValue': '' };
dict.city = { 'active': false, 'title': 'City', 'textValue': '' };
dict.state = { 'active': false, 'title': 'State', 'textValue': '' };
dict.zip = { 'active': false, 'title': 'Zip Code', 'textValue': '' };
dict.homePhone = { 'active': false, 'title': 'Home Phone', 'textValue': '' };
dict.cellPhone = { 'active': false, 'title': 'Cell Phone', 'textValue': '' };
dict.email = { 'active': false, 'title': 'Email Address', 'textValue': '' };
dict.gradYear = { 'active': false, 'title': 'High School Graduation Year', 'textValue': '' };




dict.isDependent;
dict.financialAid = { 'active':false,  'title':'Financial aid', '0':'Yes', '1': 'No', 'intValue':0, 'textValue': '' };
dict.age = { 'active': false, 'title': 'Age', 'intValue': 0 };
dict.livingStatus = { 'active': false, 'title': 'Living arrangement', 'intValue': 0, 'textValue': '' };
dict.residencyStatus = { 'active': false, 'title': 'Residency', 'intValue': 0, 'textValue': '' };
dict.maritalStatus = { 'active': false, 'title': 'Marital Status', '0': 'No', '1': 'Yes', 'intValue': '', 'textValue': '' };
dict.numberOfChildren = { 'active': false, 'title': 'Children', '0': 'No', '1': 'Yes', 'intValue': '', 'textValue': '' };
dict.numberInFamily = { 'active': false, 'title': 'Number in Family', 'intValue': 0, 'textValue': '' };
dict.numberInCollege = { 'active': false, 'title': 'Number in College', 'intValue': 0, 'textValue': '' };
dict.householdIncome = { 'active': false, 'title': 'Household Income', 'intValue' : 0, 'textValue': '',
    '0': 'Less than $30,000',
    '1': 'Between $30,000 - $39,999',
    '2': 'Between $40,000 - $49,999',
    '3': 'Between $50,000 - $59,999',
    '4': 'Between $60,000 - $69,999',
    '5': 'Between $70,000 - $79,999',
    '6': 'Between $80,000 - $89,999',
    '7': 'Between $90,000 - $99,999',
    '8': 'Above $99,999'
};

var numberoflivingstatus = 0;
var npc1_livingstatus = "";
var npc1_isdefaultlivingstatus = "0";
var npc1_residencystatus = "";
var npc1_isdefaultresidencystatus = "0";
var npc_step = "0";
var currentstepid = "0";      
           
        

var efcDependent = []; 
efcDependent[0] = {};
efcDependent[0].numberInCollege=1;
efcDependent[0].numberInFamily=2;
efcDependent[0].incomeRanges= []; 
efcDependent[0].incomeRanges[0] = 0;  efcDependent[0].incomeRanges[1] = 1354;  efcDependent[0].incomeRanges[2] = 3191;  efcDependent[0].incomeRanges[3] = 5258;  efcDependent[0].incomeRanges[4] = 7745;  efcDependent[0].incomeRanges[5] = 10897;  efcDependent[0].incomeRanges[6] = 14241;  efcDependent[0].incomeRanges[7] = 10223.5;  efcDependent[0].incomeRanges[8] = 19249;  
efcDependent[1] = {};
efcDependent[1].numberInCollege=1;
efcDependent[1].numberInFamily=3;
efcDependent[1].incomeRanges= []; 
efcDependent[1].incomeRanges[0] = 0;  efcDependent[1].incomeRanges[1] = 755;  efcDependent[1].incomeRanges[2] = 2683;  efcDependent[1].incomeRanges[3] = 4711;  efcDependent[1].incomeRanges[4] = 7029;  efcDependent[1].incomeRanges[5] = 10102;  efcDependent[1].incomeRanges[6] = 7512.5;  efcDependent[1].incomeRanges[7] = 9173.5;  efcDependent[1].incomeRanges[8] = 16603;  
efcDependent[2] = {};
efcDependent[2].numberInCollege=1;
efcDependent[2].numberInFamily=4;
efcDependent[2].incomeRanges= []; 
efcDependent[2].incomeRanges[0] = 0;  efcDependent[2].incomeRanges[1] = 17;  efcDependent[2].incomeRanges[2] = 1746;  efcDependent[2].incomeRanges[3] = 3677;  efcDependent[2].incomeRanges[4] = 5810;  efcDependent[2].incomeRanges[5] = 8372;  efcDependent[2].incomeRanges[6] = 6912;  efcDependent[2].incomeRanges[7] = 8684;  efcDependent[2].incomeRanges[8] = 33565;  
efcDependent[3] = {};
efcDependent[3].numberInCollege=1;
efcDependent[3].numberInFamily=5;
efcDependent[3].incomeRanges= []; 
efcDependent[3].incomeRanges[0] = 0;  efcDependent[3].incomeRanges[1] = 0;  efcDependent[3].incomeRanges[2] = 747;  efcDependent[3].incomeRanges[3] = 2737;  efcDependent[3].incomeRanges[4] = 4698;  efcDependent[3].incomeRanges[5] = 6980.5;  efcDependent[3].incomeRanges[6] = 6028;  efcDependent[3].incomeRanges[7] = 7748;  efcDependent[3].incomeRanges[8] = 31440;  
efcDependent[4] = {};
efcDependent[4].numberInCollege=1;
efcDependent[4].numberInFamily=6;
efcDependent[4].incomeRanges= []; 
efcDependent[4].incomeRanges[0] = 0;  efcDependent[4].incomeRanges[1] = 0;  efcDependent[4].incomeRanges[2] = 0;  efcDependent[4].incomeRanges[3] = 1182;  efcDependent[4].incomeRanges[4] = 3128;  efcDependent[4].incomeRanges[5] = 5279;  efcDependent[4].incomeRanges[6] = 4791;  efcDependent[4].incomeRanges[7] = 6535;  efcDependent[4].incomeRanges[8] = 27352;  
efcDependent[5] = {};
efcDependent[5].numberInCollege=2;
efcDependent[5].numberInFamily=2;
efcDependent[5].incomeRanges= []; 
efcDependent[5].incomeRanges[0] = 2;  efcDependent[5].incomeRanges[1] = 977;  efcDependent[5].incomeRanges[2] = 1832.5;  efcDependent[5].incomeRanges[3] = 2924;  efcDependent[5].incomeRanges[4] = 4071;  efcDependent[5].incomeRanges[5] = 5519;  efcDependent[5].incomeRanges[6] = 13590;  efcDependent[5].incomeRanges[7] = 17153;  efcDependent[5].incomeRanges[8] = 34368;  
efcDependent[6] = {};
efcDependent[6].numberInCollege=2;
efcDependent[6].numberInFamily=3;
efcDependent[6].incomeRanges= []; 
efcDependent[6].incomeRanges[0] = 0;  efcDependent[6].incomeRanges[1] = 654;  efcDependent[6].incomeRanges[2] = 1654;  efcDependent[6].incomeRanges[3] = 2745;  efcDependent[6].incomeRanges[4] = 4171;  efcDependent[6].incomeRanges[5] = 5876.5;  efcDependent[6].incomeRanges[6] = 4223.5;  efcDependent[6].incomeRanges[7] = 8114;  efcDependent[6].incomeRanges[8] = 9955;  
efcDependent[7] = {};
efcDependent[7].numberInCollege=2;
efcDependent[7].numberInFamily=4;
efcDependent[7].incomeRanges= []; 
efcDependent[7].incomeRanges[0] = 0;  efcDependent[7].incomeRanges[1] = 278;  efcDependent[7].incomeRanges[2] = 1321;  efcDependent[7].incomeRanges[3] = 2376;  efcDependent[7].incomeRanges[4] = 3600;  efcDependent[7].incomeRanges[5] = 5282;  efcDependent[7].incomeRanges[6] = 5038.5;  efcDependent[7].incomeRanges[7] = 6065;  efcDependent[7].incomeRanges[8] = 19119;  
efcDependent[8] = {};
efcDependent[8].numberInCollege=2;
efcDependent[8].numberInFamily=5;
efcDependent[8].incomeRanges= []; 
efcDependent[8].incomeRanges[0] = 0;  efcDependent[8].incomeRanges[1] = 0;  efcDependent[8].incomeRanges[2] = 791;  efcDependent[8].incomeRanges[3] = 1830;  efcDependent[8].incomeRanges[4] = 2915;  efcDependent[8].incomeRanges[5] = 4314;  efcDependent[8].incomeRanges[6] = 4628.5;  efcDependent[8].incomeRanges[7] = 5824;  efcDependent[8].incomeRanges[8] = 18273;  
efcDependent[9] = {};
efcDependent[9].numberInCollege=2;
efcDependent[9].numberInFamily=6;
efcDependent[9].incomeRanges= []; 
efcDependent[9].incomeRanges[0] = 0;  efcDependent[9].incomeRanges[1] = 0;  efcDependent[9].incomeRanges[2] = 20;  efcDependent[9].incomeRanges[3] = 1019;  efcDependent[9].incomeRanges[4] = 2033;  efcDependent[9].incomeRanges[5] = 3204.5;  efcDependent[9].incomeRanges[6] = 3469;  efcDependent[9].incomeRanges[7] = 4734;  efcDependent[9].incomeRanges[8] = 16054.5;  
efcDependent[10] = {};
efcDependent[10].numberInCollege=3;
efcDependent[10].numberInFamily=3;
efcDependent[10].incomeRanges= []; 
efcDependent[10].incomeRanges[0] = 0;  efcDependent[10].incomeRanges[1] = 1013;  efcDependent[10].incomeRanges[2] = 1377.5;  efcDependent[10].incomeRanges[3] = 2130;  efcDependent[10].incomeRanges[4] = 2891;  efcDependent[10].incomeRanges[5] = 3879;  efcDependent[10].incomeRanges[6] = 11743;  efcDependent[10].incomeRanges[7] = 15326;  
efcDependent[11] = {};
efcDependent[11].numberInCollege=3;
efcDependent[11].numberInFamily=4;
efcDependent[11].incomeRanges= []; 
efcDependent[11].incomeRanges[0] = 0;  efcDependent[11].incomeRanges[1] = 285;  efcDependent[11].incomeRanges[2] = 998;  efcDependent[11].incomeRanges[3] = 1743;  efcDependent[11].incomeRanges[4] = 2659.5;  efcDependent[11].incomeRanges[5] = 3831;  efcDependent[11].incomeRanges[6] = 10006;  efcDependent[11].incomeRanges[7] = 13599;  efcDependent[11].incomeRanges[8] = 11056;  
efcDependent[12] = {};
efcDependent[12].numberInCollege=3;
efcDependent[12].numberInFamily=5;
efcDependent[12].incomeRanges= []; 
efcDependent[12].incomeRanges[0] = 0;  efcDependent[12].incomeRanges[1] = 94;  efcDependent[12].incomeRanges[2] = 779;  efcDependent[12].incomeRanges[3] = 1480;  efcDependent[12].incomeRanges[4] = 2305;  efcDependent[12].incomeRanges[5] = 3389;  efcDependent[12].incomeRanges[6] = 7716;  efcDependent[12].incomeRanges[7] = 10987;  efcDependent[12].incomeRanges[8] = 13283;  
efcDependent[13] = {};
efcDependent[13].numberInCollege=3;
efcDependent[13].numberInFamily=6;
efcDependent[13].incomeRanges= []; 
efcDependent[13].incomeRanges[0] = 0;  efcDependent[13].incomeRanges[1] = 0;  efcDependent[13].incomeRanges[2] = 132.5;  efcDependent[13].incomeRanges[3] = 870;  efcDependent[13].incomeRanges[4] = 1560;  efcDependent[13].incomeRanges[5] = 2404;  efcDependent[13].incomeRanges[6] = 17602;  efcDependent[13].incomeRanges[7] = 31014;  efcDependent[13].incomeRanges[8] = 11340;  

var efcIndWithoutDep = []; 
efcIndWithoutDep[0] = {};
efcIndWithoutDep[0].numberInCollege=1;
efcIndWithoutDep[0].numberInFamily=1;
efcIndWithoutDep[0].incomeRanges= []; 
efcIndWithoutDep[0].incomeRanges[0] = 0;  efcIndWithoutDep[0].incomeRanges[1] = 9235;  efcIndWithoutDep[0].incomeRanges[2] = 13116;  efcIndWithoutDep[0].incomeRanges[3] = 16905;  efcIndWithoutDep[0].incomeRanges[4] = 20584;  efcIndWithoutDep[0].incomeRanges[5] = 24187;  efcIndWithoutDep[0].incomeRanges[6] = 27969;  efcIndWithoutDep[0].incomeRanges[7] = 31834;  efcIndWithoutDep[0].incomeRanges[8] = 48593;  
efcIndWithoutDep[1] = {};
efcIndWithoutDep[1].numberInCollege=1;
efcIndWithoutDep[1].numberInFamily=2;
efcIndWithoutDep[1].incomeRanges= []; 
efcIndWithoutDep[1].incomeRanges[0] = 0;  efcIndWithoutDep[1].incomeRanges[1] = 6262;  efcIndWithoutDep[1].incomeRanges[2] = 9921;  efcIndWithoutDep[1].incomeRanges[3] = 13763;  efcIndWithoutDep[1].incomeRanges[4] = 17478;  efcIndWithoutDep[1].incomeRanges[5] = 21276;  efcIndWithoutDep[1].incomeRanges[6] = 25098.5;  efcIndWithoutDep[1].incomeRanges[7] = 28871;  efcIndWithoutDep[1].incomeRanges[8] = 42201;  
efcIndWithoutDep[2] = {};
efcIndWithoutDep[2].numberInCollege=2;
efcIndWithoutDep[2].numberInFamily=2;
efcIndWithoutDep[2].incomeRanges= []; 
efcIndWithoutDep[2].incomeRanges[0] = 538;  efcIndWithoutDep[2].incomeRanges[1] = 4544;  efcIndWithoutDep[2].incomeRanges[2] = 6399;  efcIndWithoutDep[2].incomeRanges[3] = 8327;  efcIndWithoutDep[2].incomeRanges[4] = 10193;  efcIndWithoutDep[2].incomeRanges[5] = 12090;  efcIndWithoutDep[2].incomeRanges[6] = 14007.5;  efcIndWithoutDep[2].incomeRanges[7] = 15878;  efcIndWithoutDep[2].incomeRanges[8] = 21580;  

var efcIndWithDep = []; 
efcIndWithDep[0] = {};
efcIndWithDep[0].numberInCollege=1;
efcIndWithDep[0].numberInFamily=2;
efcIndWithDep[0].incomeRanges= []; 
efcIndWithDep[0].incomeRanges[0] = 0;  efcIndWithDep[0].incomeRanges[1] = 64;  efcIndWithDep[0].incomeRanges[2] = 1793.5;  efcIndWithDep[0].incomeRanges[3] = 3470;  efcIndWithDep[0].incomeRanges[4] = 5524;  efcIndWithDep[0].incomeRanges[5] = 8058;  efcIndWithDep[0].incomeRanges[6] = 11186;  efcIndWithDep[0].incomeRanges[7] = 14416;  efcIndWithDep[0].incomeRanges[8] = 25428;  
efcIndWithDep[1] = {};
efcIndWithDep[1].numberInCollege=1;
efcIndWithDep[1].numberInFamily=3;
efcIndWithDep[1].incomeRanges= []; 
efcIndWithDep[1].incomeRanges[0] = 0;  efcIndWithDep[1].incomeRanges[1] = 0;  efcIndWithDep[1].incomeRanges[2] = 977;  efcIndWithDep[1].incomeRanges[3] = 2688;  efcIndWithDep[1].incomeRanges[4] = 4492;  efcIndWithDep[1].incomeRanges[5] = 6820;  efcIndWithDep[1].incomeRanges[6] = 9992;  efcIndWithDep[1].incomeRanges[7] = 13527;  efcIndWithDep[1].incomeRanges[8] = 23124;  
efcIndWithDep[2] = {};
efcIndWithDep[2].numberInCollege=1;
efcIndWithDep[2].numberInFamily=4;
efcIndWithDep[2].incomeRanges= []; 
efcIndWithDep[2].incomeRanges[0] = 0;  efcIndWithDep[2].incomeRanges[1] = 0;  efcIndWithDep[2].incomeRanges[2] = 0;  efcIndWithDep[2].incomeRanges[3] = 1515;  efcIndWithDep[2].incomeRanges[4] = 3177;  efcIndWithDep[2].incomeRanges[5] = 5153;  efcIndWithDep[2].incomeRanges[6] = 7654;  efcIndWithDep[2].incomeRanges[7] = 11080;  efcIndWithDep[2].incomeRanges[8] = 20790;  
efcIndWithDep[3] = {};
efcIndWithDep[3].numberInCollege=1;
efcIndWithDep[3].numberInFamily=5;
efcIndWithDep[3].incomeRanges= []; 
efcIndWithDep[3].incomeRanges[0] = 0;  efcIndWithDep[3].incomeRanges[1] = 0;  efcIndWithDep[3].incomeRanges[2] = 0;  efcIndWithDep[3].incomeRanges[3] = 192;  efcIndWithDep[3].incomeRanges[4] = 1945;  efcIndWithDep[3].incomeRanges[5] = 3661;  efcIndWithDep[3].incomeRanges[6] = 5779;  efcIndWithDep[3].incomeRanges[7] = 8528;  efcIndWithDep[3].incomeRanges[8] = 18183.5;  
efcIndWithDep[4] = {};
efcIndWithDep[4].numberInCollege=1;
efcIndWithDep[4].numberInFamily=6;
efcIndWithDep[4].incomeRanges= []; 
efcIndWithDep[4].incomeRanges[0] = 0;  efcIndWithDep[4].incomeRanges[1] = 0;  efcIndWithDep[4].incomeRanges[2] = 0;  efcIndWithDep[4].incomeRanges[3] = 0;  efcIndWithDep[4].incomeRanges[4] = 68;  efcIndWithDep[4].incomeRanges[5] = 1862.5;  efcIndWithDep[4].incomeRanges[6] = 3584;  efcIndWithDep[4].incomeRanges[7] = 5746;  efcIndWithDep[4].incomeRanges[8] = 14401;  
efcIndWithDep[5] = {};
efcIndWithDep[5].numberInCollege=2;
efcIndWithDep[5].numberInFamily=2;
efcIndWithDep[5].incomeRanges= []; 
efcIndWithDep[5].incomeRanges[0] = 0;  efcIndWithDep[5].incomeRanges[1] = 508;  efcIndWithDep[5].incomeRanges[2] = 1352;  efcIndWithDep[5].incomeRanges[3] = 2251;  efcIndWithDep[5].incomeRanges[4] = 3440;  efcIndWithDep[5].incomeRanges[5] = 4997;  efcIndWithDep[5].incomeRanges[6] = 6603;  efcIndWithDep[5].incomeRanges[7] = 8053;  efcIndWithDep[5].incomeRanges[8] = 12993;  
efcIndWithDep[6] = {};
efcIndWithDep[6].numberInCollege=2;
efcIndWithDep[6].numberInFamily=3;
efcIndWithDep[6].incomeRanges= []; 
efcIndWithDep[6].incomeRanges[0] = 0;  efcIndWithDep[6].incomeRanges[1] = 97;  efcIndWithDep[6].incomeRanges[2] = 972;  efcIndWithDep[6].incomeRanges[3] = 1812;  efcIndWithDep[6].incomeRanges[4] = 2839;  efcIndWithDep[6].incomeRanges[5] = 4218;  efcIndWithDep[6].incomeRanges[6] = 5961.5;  efcIndWithDep[6].incomeRanges[7] = 7709;  efcIndWithDep[6].incomeRanges[8] = 12612;  
efcIndWithDep[7] = {};
efcIndWithDep[7].numberInCollege=2;
efcIndWithDep[7].numberInFamily=4;
efcIndWithDep[7].incomeRanges= []; 
efcIndWithDep[7].incomeRanges[0] = 0;  efcIndWithDep[7].incomeRanges[1] = 0;  efcIndWithDep[7].incomeRanges[2] = 347;  efcIndWithDep[7].incomeRanges[3] = 1190;  efcIndWithDep[7].incomeRanges[4] = 2027;  efcIndWithDep[7].incomeRanges[5] = 3099;  efcIndWithDep[7].incomeRanges[6] = 4576;  efcIndWithDep[7].incomeRanges[7] = 6232;  efcIndWithDep[7].incomeRanges[8] = 10708;  
efcIndWithDep[8] = {};
efcIndWithDep[8].numberInCollege=2;
efcIndWithDep[8].numberInFamily=5;
efcIndWithDep[8].incomeRanges= []; 
efcIndWithDep[8].incomeRanges[0] = 0;  efcIndWithDep[8].incomeRanges[1] = 0;  efcIndWithDep[8].incomeRanges[2] = 0;  efcIndWithDep[8].incomeRanges[3] = 587;  efcIndWithDep[8].incomeRanges[4] = 1363;  efcIndWithDep[8].incomeRanges[5] = 2241;  efcIndWithDep[8].incomeRanges[6] = 3394;  efcIndWithDep[8].incomeRanges[7] = 4913;  efcIndWithDep[8].incomeRanges[8] = 9283;  
efcIndWithDep[9] = {};
efcIndWithDep[9].numberInCollege=2;
efcIndWithDep[9].numberInFamily=6;
efcIndWithDep[9].incomeRanges= []; 
efcIndWithDep[9].incomeRanges[0] = 0;  efcIndWithDep[9].incomeRanges[1] = 0;  efcIndWithDep[9].incomeRanges[2] = 0;  efcIndWithDep[9].incomeRanges[3] = 0;  efcIndWithDep[9].incomeRanges[4] = 500;  efcIndWithDep[9].incomeRanges[5] = 1237;  efcIndWithDep[9].incomeRanges[6] = 2063.5;  efcIndWithDep[9].incomeRanges[7] = 3110;  efcIndWithDep[9].incomeRanges[8] = 7219;  
        
        // POA
        var POA_Total = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var POA_TRF = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var POA_BS = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var POA_RB = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];        
        var POA_O = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        
             
        // TGA
        var TGA_0 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_1_1000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_1001_2500 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_2501_5000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_5001_7500 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_7501_10000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_10001_12500 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_12501_15000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_15001_20000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_20001_30000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_30001_40000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_40000 = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var TGA_NFAFSA = ['0', '0', '0', '0', '0', '0', '0', '0', '0'];
        POA_Total = ['27571','22926','16576'];
POA_TRF = ['14226','14226','14226'];
POA_BS = ['1600','1600','1600'];
POA_RB = ['8745','4100','0'];
POA_O = ['3000','3000','750'];
TGA_0 = ['14209','14209','14209'];
TGA_1_1000 = ['12853','12853','12853'];
TGA_1001_2500 = ['13824','11884','12035'];
TGA_2501_5000 = ['10758','11367','10727'];
TGA_5001_7500 = ['9092','11160','9092'];
TGA_7501_10000 = ['9523','11097','9523'];
TGA_10001_12500 = ['12468','11080','9636'];
TGA_12501_15000 = ['8907','11076','9664'];
TGA_15001_20000 = ['9796','11075','9673'];
TGA_20001_30000 = ['9605','11075','9677'];
TGA_30001_40000 = ['9200','11075','9679'];
TGA_40000 = ['8394','0','0'];
TGA_NFAFSA = ['8200','0','0'];





// Step id Defenition
// 1 Optional Identifying Information
// 2 Age, Living Status, Residency Status
// 3 Marital Status, Number of Children
// 4 Dependent
// 5 Independent
// 6 Summary page
// 7 OUTPUT PAGE        
function GoNext() {
    var imgJavaScriptNote = document.getElementById('imgJavaScriptNote');
    if(imgJavaScriptNote) {
        imgJavaScriptNote.style.display = 'none';
    }

    // Variable that tells us if we need to dispaly only 2 radio buttons for "Dependent: Number of Family"
    var showOnly2RbForNumberInFamily = false;

    if (currentstepid) {
        if (currentstepid == "0") {                    
            GoTo("1");
            return;
        } else if(currentstepid == "1") {
          var tmp = '';
          var personalInfo = false;
          tmp = GetTextBoxValue("First_Name");
          if(tmp.trim().length){
            dict['firstName'].active = true;
            personalInfo = true;
            dict['firstName'].textValue = tmp.trim();
          } else {
            dict['firstName'].active = false;
          }
          tmp = GetTextBoxValue("Last_Name");
          if(tmp.trim().length){
            personalInfo = true;

            dict['lastName'].active = true;
            dict['lastName'].textValue = tmp.trim();
          } else {
            dict['lastName'].active = false;
          }
          tmp = GetTextBoxValue("Address");
          if(tmp.trim().length){
            personalInfo = true;
            dict['address'].active = true;
            dict['address'].textValue = tmp.trim();
          } else {
            dict['address'].active = false;
          }

          tmp = GetTextBoxValue("City");
          if(tmp.trim().length){
            personalInfo = true;
            dict['city'].active = true;
            dict['city'].textValue = tmp.trim();
          } else {
            dict['city'].active = false;
          }
          tmp = GetSelectBoxValue("State");
          if(tmp.trim().length){
            personalInfo = true;
            dict['state'].active = true;
            dict['state'].textValue = tmp.trim();
          } else {
            dict['state'].active = false;
          }

          tmp = GetTextBoxValue("Zip");
          if(tmp.trim().length){
            personalInfo = true;
            dict['zip'].active = true;
            dict['zip'].textValue = tmp.trim();
          } else {
            dict['zip'].active = false;
          }

          tmp = GetTextBoxValue("Home_Phone");
          if(tmp.trim().length){
            personalInfo = true;
            dict['homePhone'].active = true;
            dict['homePhone'].textValue = tmp.trim();
          } else {
            dict['homePhone'].active = false;
          }

          tmp = GetTextBoxValue("Cell_Phone");
          if(tmp.trim().length){
            personalInfo = true;
            dict['cellPhone'].active = true;
            dict['cellPhone'].textValue = tmp.trim();
          } else {
            dict['cellPhone'].active = false;
          }

          tmp = GetTextBoxValue("Email");
          if(tmp.trim().length){
            personalInfo = true;
            dict['email'].active = true;
            dict['email'].textValue = tmp.trim();
          } else {
            dict['email'].active = false;
          }

          tmp = GetTextBoxValue("HS_Grad_Year");
          if(tmp.trim().length){
            personalInfo = true;
            dict['gradYear'].active = true;
            dict['gradYear'].textValue = tmp.trim();
          } else {
            dict['gradYear'].active = false;
          }


          dict['personalInfo'] = personalInfo;

          GoTo("2");
          return
        } else if (currentstepid == "2") {
            var tmp_financialAid = GetRadioButtonValues("rb_financialaid").value; // Financial Aid                    
            var tmp_age = GetTextBoxValue("txt_age"); // Age
            // Living Status
            if (npc1_livingstatus != "-1") {
                if (npc1_isdefaultlivingstatus == "0") {
                    npc1_livingstatus = GetRadioButtonValues("rb_livingstatus").value;
                }
            }
            // Residency Status
            if (npc1_residencystatus != "-1") {
                if (npc1_isdefaultresidencystatus == "0") {
                    npc1_residencystatus = GetRadioButtonValues("rb_residencystatus").value;
                }
            }
            // Validate
            if (tmp_financialAid == "" || tmp_age == "" || npc1_livingstatus == "" || npc1_residencystatus == "") {
                alert("Please answer all questions before proceeding.");
                return;
            }
            if (!IsInteger(tmp_age)) {
                alert("Please enter integers only.");
                return;
            }
            
            // Save entered values into dictionary
            dict['financialAid'].active = true;
            dict['financialAid'].intValue = tmp_financialAid;
            dict['financialAid'].textValue = dict['financialAid'][dict['financialAid'].intValue];
            dict['age'].active = true;
            dict['age'].intValue = tmp_age;                    
            if (npc1_livingstatus != "-1") {
                if (npc1_isdefaultlivingstatus == "0") {
                    dict['livingStatus'].active = true;
                    dict['livingStatus']['textValue'] = GetRadioButtonValues("rb_livingstatus").label.getAttribute('title');
                    
                }
            }
            if (npc1_residencystatus != "-1") {
                if (npc1_isdefaultresidencystatus == "0") {
                    dict['residencyStatus'].active = true;
                    dict['residencyStatus']['textValue'] = GetRadioButtonValues("rb_residencystatus").label.getAttribute('title');
                }
            }
            
            // Rules
            if (dict['financialAid'].intValue == "1") {
                GenerateSummary();
                GoTo("6"); 
            } 
            else {
                // Hide/show marital status depending on age
                if (dict['age'].intValue*1 > 23) {
                    var tbl = document.getElementById('tblMaritalStatusQuestion');
                    if (tbl) { tbl.style.display = 'none'; }
                } else {
                    var tbl = document.getElementById('tblMaritalStatusQuestion');
                    if (tbl) { tbl.style.display = ''; }
                }
                GoTo("3"); // Change: was 4
            }
            return;
        } else if (currentstepid == "3") {
            // Marital Status
            var tmp_maritalStatus;
            if (dict['age'].intValue*1 < 24) {
                tmp_maritalStatus = GetRadioButtonValues("rb_maritalstatus").value;                       
                dict['maritalStatus'].active = true;
            }
            else { dict['maritalStatus'].active = false; }
            
            // Number of Children
            var tmp_numberOfChildren = GetRadioButtonValues("rb_numberofchildren").value;

            // Validate
            var showError = false;
            if (dict['age'].intValue * 1 < 24 && tmp_maritalStatus == "") {
                showError = true;
            }
            if (tmp_numberOfChildren == "") {
                showError = true;                        
            }
            if (showError == true) {
                alert("Please answer all questions before proceeding.");
                return;
            }
            // Save entered values into dictionary
            dict['maritalStatus'].intValue = tmp_maritalStatus;
            dict['maritalStatus'].textValue = dict['maritalStatus'][dict['maritalStatus'].intValue];

            dict['numberOfChildren'].active = true;
            dict['numberOfChildren'].intValue = tmp_numberOfChildren;
            dict['numberOfChildren'].textValue = dict['numberOfChildren'][dict['numberOfChildren'].intValue];


            // For independent with children, display additional radio buttons with 'Number in Family'
            var divNumInFamilyRadiobuttons = document.getElementById('divNumInFamilyWithChildren');

            // For independent there are 2 different hints: with children and without
            var spanNumInFamilyHint = document.getElementById('spanNumInFamilyHint');
            if (spanNumInFamilyHint)
                spanNumInFamilyHint.style.display = 'none';
            var spanNumInFamilyHintWithChildren = document.getElementById('spanNumInFamilyHintWithChildren');
            if (spanNumInFamilyHintWithChildren)
                spanNumInFamilyHintWithChildren.style.display = 'none';

            // For independent we have 2 different scenarios for number on college: 'Two' and 'Two or more'
            var spanTwo = document.getElementById('spanIndNumInCollegeTwo');
            var spanTwoOrMore = document.getElementById('spanIndNumInCollegeTwoOrMore');
            var divFirstOptionForNumInFamilyWithChildren = document.getElementById('divFirstOptionForNumInFamilyWithChildren');

            spanTwo.style.display = 'none';
            spanTwoOrMore.style.display = 'none';
            divFirstOptionForNumInFamilyWithChildren.style.display = '';
            
            

            // Rules
            if (dict['age'].intValue * 1 > 23) {
                 var divNumInFWithCh = document.getElementById('divNumInFamilyWithChildren');
                if (dict['maritalStatus'].intValue * 1 > 0) {
                    // show options for student with children                            
                    if (divNumInFWithCh) { divNumInFWithCh.style.display = ''; }                            
                }
                else {
                    // hide options for student with children
                    if (divNumInFWithCh) { divNumInFWithCh.style.display = 'none'; }                            
                }
                dict.isDependent = false;
                if (dict['numberOfChildren'].intValue * 1 == 1) {
                    if (spanTwo) { spanTwo.style.display = 'none'; }
                    if (spanTwoOrMore) { spanTwoOrMore.style.display = ''; }
                    if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = ''; }
                    if (spanNumInFamilyHintWithChildren) { spanNumInFamilyHintWithChildren.style.display = ''; }
                    if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = 'none'; }
                    // This flag tells us that for "Number in Family" we should display more than 2 radio buttons
                    showOnly2RbForNumberInFamily = false;

                    // If user selected before "Number in College: Two" and now we display "Two or More", we need to reset radio buttons
                    var rbTwoOrMore = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                    if(rbTwoOrMore && rbTwoOrMore[0] == "Two")
                        ResetRadioButton('rb_indnumincollege');

                } else {
                    if (spanTwo) { spanTwo.style.display = ''; }
                    if (spanTwoOrMore) { spanTwoOrMore.style.display = 'none'; }
                    if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = 'none'; }
                    if (spanNumInFamilyHint) { spanNumInFamilyHint.style.display = ''; }
                    if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = ''; }
                    // This flag tells us that for "Number in Family" we should display only 2 radio buttons
                    showOnly2RbForNumberInFamily = true;
                    
                    // If user selected before "Number in College: Two or More" and now we display "Two", we need to reset radio buttons
                    var rbTwoOrMore = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                    if(rbTwoOrMore && rbTwoOrMore[0] == "Two or more")
                        ResetRadioButton('rb_indnumincollege');
                }
                if (showOnly2RbForNumberInFamily == true) {
                    var prevSelectedNumOfFamily = GetRadioButtonValues("rb_indnuminfamily").value.split('|');
                    if (prevSelectedNumOfFamily) {
                        if (prevSelectedNumOfFamily[1] > 2)
                            ResetRadioButton('rb_indnuminfamily');
                    }
                }
                GoTo('5');

            } else {
                if (dict['numberOfChildren'].intValue * 1 > 0 || dict['maritalStatus'].intValue * 1 > 0) {                           
                    dict.isDependent = false;
                    if (dict['numberOfChildren'].intValue * 1 > 0)
                        showOnly2RbForNumberInFamily = false;                            
                    else
                        showOnly2RbForNumberInFamily = true;

                    if(showOnly2RbForNumberInFamily == true)
                    {
                        var prevSelectedNumOfFamily = GetRadioButtonValues("rb_indnuminfamily").value.split('|');
                        if (prevSelectedNumOfFamily) {
                            if (prevSelectedNumOfFamily[1] > 2)
                                ResetRadioButton('rb_indnuminfamily');
                        }
                    }

                    if (dict['numberOfChildren'].intValue * 1 == 1) {
                        if (spanTwo) { spanTwo.style.display = 'none'; }
                        if (spanTwoOrMore) { spanTwoOrMore.style.display = ''; }
                        if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = ''; }
                        if (spanNumInFamilyHintWithChildren) { spanNumInFamilyHintWithChildren.style.display = ''; }
                        if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = 'none'; }
                        // If user selected before "Number in College: Two" and now we display "Two or More", we need to reset radio buttons
                        var rbTwoOrMore = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                        if(rbTwoOrMore && rbTwoOrMore[0] == "Two")
                            ResetRadioButton('rb_indnumincollege');
                    } else {
                        if (spanTwo) { spanTwo.style.display = ''; }
                        if (spanTwoOrMore) { spanTwoOrMore.style.display = 'none'; }
                        if (divNumInFamilyRadiobuttons) { divNumInFamilyRadiobuttons.style.display = 'none'; }
                        if (spanNumInFamilyHint) { spanNumInFamilyHint.style.display = ''; }
                        if (divFirstOptionForNumInFamilyWithChildren) { divFirstOptionForNumInFamilyWithChildren.style.display = ''; }
                        // If user selected before "Number in College: Two or More" and now we display "Two", we need to reset radio buttons
                        var rbTwoOrMore = GetRadioButtonValues("rb_indnumincollege").value.split('|');
                        if(rbTwoOrMore && rbTwoOrMore[0] == "Two or more")
                            ResetRadioButton('rb_indnumincollege');
                    }

                    GoTo("5");
                } else {
                    dict.isDependent = true;
                    GoTo("4");  
                }
            }
            return;
        } else if (currentstepid == "4") {                    
            var arrNumInFamily = GetRadioButtonValues("rb_numinfamily_dep").value.split('|');
            var arrNumInCollege = GetRadioButtonValues("rb_numincollege_dep").value.split('|');                                        
            var tmp_numberinfamily = arrNumInFamily[0];
            var tmp_numberincollege = arrNumInCollege[0];
            var tmp_householdincome = GetRadioButtonValues("rb_householdincome_dep").value;
            
            // Validate
            if (tmp_numberinfamily == "" || tmp_numberincollege == "" || tmp_householdincome == "") {
                alert("Please answer all questions before proceeding.");
                return;
            }                   
            if (arrNumInCollege[1] * 1 >= arrNumInFamily[1] * 1) {                        
                alert('The Number in College must be less than the specified Number in Family.');
                return;
            }
            
            // Save entered values into dictionary
            dict['numberInFamily'].active = true;
            dict['numberInFamily'].textValue = tmp_numberinfamily;
            dict['numberInFamily'].intValue = arrNumInFamily[1]*1;
            dict['numberInCollege'].active = true;
            dict['numberInCollege'].textValue = tmp_numberincollege;
            dict['numberInCollege'].intValue = arrNumInCollege[1]*1;
            dict['householdIncome'].active = true;
            dict['householdIncome'].intValue = tmp_householdincome * 1;
            dict['householdIncome'].textValue = dict['householdIncome'][dict['householdIncome'].intValue];
            GenerateSummary();
            GoTo("6");
            return;
        } else if (currentstepid == "5") {
            var arrNumInFamily = GetRadioButtonValues("rb_indnuminfamily").value.split('|');
            var arrNumInCollege = GetRadioButtonValues("rb_indnumincollege").value.split('|');
            var tmp_numberinfamily = arrNumInFamily[0];
            var tmp_numberincollege = arrNumInCollege[0];
            var tmp_householdincome = GetRadioButtonValues("rb_householdincome_ind").value;

            // Validate
            if (tmp_numberinfamily == "" || tmp_numberincollege == "" || tmp_householdincome == "") {
                alert("Please answer all questions before proceeding.");
                return;
            }
            if (arrNumInCollege[1] * 1 > arrNumInFamily[1] * 1) {
                alert('The Number in College must be less than or equal to the specified Number in Family.');
                return;
            }

            // Save entered values into dictionary
            dict['numberInFamily'].active = true;
            dict['numberInFamily'].textValue = tmp_numberinfamily;
            dict['numberInFamily'].intValue = arrNumInFamily[1]*1;
            dict['numberInCollege'].active = true;
            dict['numberInCollege'].textValue = tmp_numberincollege;
            dict['numberInCollege'].intValue = arrNumInCollege[1]*1;
            dict['householdIncome'].active = true;
            dict['householdIncome'].intValue = tmp_householdincome * 1;
            dict['householdIncome'].textValue = dict['householdIncome'][dict['householdIncome'].intValue];
            
            GenerateSummary();
            GoTo("6");
            return;
        }
        else if(currentstepid == "6")
        {
            GenerateReport();
            GoTo("7");
        }
    }
}

function GoTo(stepid) {
    if (typeof stepid != 'undefined') {
        var divWithContent = document.getElementById('dv_npc_s' + stepid);
        var stepTitle = document.getElementById('dv_npc_s' + stepid + '_t');
        var stepnumber = document.getElementById("s_step" + stepid);
        var dv_npc_s6_r = document.getElementById("dv_npc_s"+stepid+"_r");
        
        if ((divWithContent && stepTitle && stepnumber) || (divWithContent && stepid=="0")) {
            // Handle Step Number
            if (stepid == "0") {                      // Going Back to Step #0  
                openInstitutionNameWindow();
                npc_step = "0";
            }
            else if (stepid * 1 > currentstepid) {    // next
                npc_step = npc_step * 1 + 1;
            } else {                                  // previous
                npc_step = npc_step * 1 - 1;
            }

            // Write step number to span element
            if (stepid != "0") {
                stepnumber.innerHTML = npc_step;
            }

            // Show/Hide Step - Change Step
            HideAllSteps();
            divWithContent.style.display = "block";                    
            if (stepid != "0") {
                stepTitle.style.display = "block";
            }
            if (stepid == "7") {
                dv_npc_s7_r.style.display = "block";
                var s_step7_h1 = document.getElementById("s_step7_h1");
                var s_step7_h2 = document.getElementById("s_step7_h2");
                if (s_step7_h1 && s_step7_h2) {
                    if (npc1_financialaid * 1 == 0) {
                        s_step7_h1.style.display = "block";
                        s_step7_h2.style.display = "none";
                    } else {
                        s_step7_h1.style.display = "none";
                        s_step7_h2.style.display = "block";
                    }
                }
            }                    
            currentstepid = stepid;
            jQuery(".region-content").get(0).scrollIntoView();
        }
    }
}



function GoPrevious() {            
    var imgJavaScriptNote = document.getElementById('imgJavaScriptNote');
    if(imgJavaScriptNote) {
        imgJavaScriptNote.style.display = 'none';
    }

    if(currentstepid == '1') {                
        if(imgJavaScriptNote) {
            imgJavaScriptNote.style.display = '';
        }
    }
    
    if (currentstepid != '6' && currentstepid != '5') {
        GoTo('' + (currentstepid * 1 - 1));
    }
    else if (currentstepid == '5') {
        GoTo('3');
    }
    else {
        if (dict.isDependent == true)
            GoTo('4');
        else
            GoTo('5');
    }
}


function GenerateReport() {
    var efc = 0;
    if (dict['financialAid'].intValue * 1 == 0) {                
        efc = GetEFC();
    }
    var lookup_column = "-1";
    if (npc1_livingstatus == "-1") {
        lookup_column = npc1_livingstatus;
    } else {
        var res_status = 0;
        if (npc1_residencystatus != "-1") {
            res_status = npc1_residencystatus;
        }
        lookup_column = numberoflivingstatus * 1 * res_status * 1 + npc1_livingstatus * 1;
    }
    
    if (lookup_column == "-1") {
        return;
    }
    
    var s_etpoa = document.getElementById("s_etpoa");
    var s_etf = document.getElementById("s_etf");
    var s_erb = document.getElementById("s_erb");
    var s_ebs = document.getElementById("s_ebs");
    var s_eo = document.getElementById("s_eo");
    var s_etga = document.getElementById("s_etga");
    var s_enp = document.getElementById("s_enp");
    var x = 0;
    var y = 0;
    
    if (s_etpoa) {
        x = POA_Total[lookup_column];
        s_etpoa.innerHTML = formatCurrency(x);
    }
    if (s_etf) {
        s_etf.innerHTML = formatCurrency(POA_TRF[lookup_column]);
    }
    if (s_erb) {
        s_erb.innerHTML = formatCurrency(POA_RB[lookup_column]);
    }
    if (s_ebs) {
        s_ebs.innerHTML = formatCurrency(POA_BS[lookup_column]);
    }
    if (s_eo) {
        s_eo.innerHTML = formatCurrency(POA_O[lookup_column]);
    }
    if (s_etga) {
        if (dict['financialAid'].intValue * 1 == 1) {
            // NON-FAFSA
            y = TGA_NFAFSA[lookup_column];
        }  else if (efc * 1 == 0) {
            y = TGA_0[lookup_column];
        } else if (efc * 1 >= 1 && efc * 1 <= 1000) {
            y = TGA_1_1000[lookup_column];
        } else if (efc * 1001 >= 1 && efc * 1 <= 2500) {
            y = TGA_1001_2500[lookup_column];
        } else if (efc * 2501 >= 1 && efc * 1 <= 5000) {
            y = TGA_2501_5000[lookup_column];
        } else if (efc * 1 >= 5001 && efc * 1 <= 7500) {
            y = TGA_5001_7500[lookup_column];
        } else if (efc * 1 >= 7501 && efc * 1 <= 10000) {
            y = TGA_7501_10000[lookup_column];
        } else if (efc * 1 >= 10001 && efc * 1 <= 12500) {
            y = TGA_10001_12500[lookup_column];
        } else if (efc * 1 >= 12501 && efc * 1 <= 15000) {
            y = TGA_12501_15000[lookup_column];
        } else if (efc * 1 >= 15001 && efc * 1 <= 20000) {
            y = TGA_15001_20000[lookup_column];
        } else if (efc * 1 >= 20001 && efc * 1 <= 30000) {
            y = TGA_20001_30000[lookup_column];
        } else if (efc * 1 >= 30001 && efc * 1 <= 40000) {
            y = TGA_30001_40000[lookup_column];
        } else if (efc * 1 >= 40001) {
            y = TGA_40000[lookup_column];
        }
        s_etga.innerHTML = formatCurrency(y);
    }
    if (s_enp) {
        var z = x * 1 - y * 1;
        s_enp.innerHTML = formatCurrency(z);
    }
    if(dict['personalInfo']) {
      submitValues();
    }
    
}


function GetEFC() {
    var efc = 0;
    if(dict.isDependent == true) {
        var arrayLength = efcDependent.length;
        for(var i=0; i<arrayLength; i++) {
            if(efcDependent[i].numberInCollege == dict['numberInCollege'].intValue && efcDependent[i].numberInFamily == dict['numberInFamily'].intValue) {
                efc = efcDependent[i].incomeRanges[dict['householdIncome'].intValue];
                break;
            }
        }

    } else {                
        if(dict['numberOfChildren'].intValue == 0) {
            // without children
            var arrayLength = efcIndWithoutDep.length;
            for(var i=0; i<arrayLength; i++) {
                if(efcIndWithoutDep[i].numberInCollege == dict['numberInCollege'].intValue && efcIndWithoutDep[i].numberInFamily == dict['numberInFamily'].intValue) {
                    efc = efcIndWithoutDep[i].incomeRanges[dict['householdIncome'].intValue];
                    break;
                }
            }
        } else {
            // with children
            var arrayLength = efcIndWithDep.length;
            for(var i=0; i<arrayLength; i++) {
                if(efcIndWithDep[i].numberInCollege == dict['numberInCollege'].intValue && efcIndWithDep[i].numberInFamily == dict['numberInFamily'].intValue) {
                    efc = efcIndWithDep[i].incomeRanges[dict['householdIncome'].intValue];
                    break;
                }
            }
        }
    }
    return efc;
}

// Generate summary table with user's input
function GenerateSummary() { 
  console.log(dict);
    var html = '<table border=\'0\' cellpadding=\'2\' cellspacing=\'0\' style=\'width:100%;\'>';

    if(dict['firstName'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['firstName'].title+'</td><td>'+dict['firstName'].textValue+'</td></tr>';
    }
    if(dict['lastName'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['lastName'].title+'</td><td>'+dict['lastName'].textValue+'</td></tr>';
    }
    if(dict['address'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['address'].title+'</td><td>'+dict['address'].textValue+'</td></tr>';
    }
    if(dict['city'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['city'].title+'</td><td>'+dict['city'].textValue+'</td></tr>';
    }
    if(dict['state'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['state'].title+'</td><td>'+dict['state'].textValue+'</td></tr>';
    }
    if(dict['zip'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['zip'].title+'</td><td>'+dict['zip'].textValue+'</td></tr>';
    }
    if(dict['homePhone'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['homePhone'].title+'</td><td>'+dict['homePhone'].textValue+'</td></tr>';
    }
    if(dict['cellPhone'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['cellPhone'].title+'</td><td>'+dict['cellPhone'].textValue+'</td></tr>';
    }
    if(dict['email'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['email'].title+'</td><td>'+dict['email'].textValue+'</td></tr>';
    }
    if(dict['gradYear'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['gradYear'].title+'</td><td>'+dict['gradYear'].textValue+'</td></tr>';
    }




    // Step 2
    if (dict['financialAid'].active == true) {
        html = html + '<tr><td class=\'boldtd\'>' + dict['financialAid'].title + '</td><td>' + dict['financialAid'][dict['financialAid'].intValue] + '</td></tr>';
    }
    if(dict['age'].active == true) {
        html = html +'<tr><td class=\'boldtd\'>'+dict['age'].title+'</td><td>'+dict['age'].intValue+'</td></tr>';
    }
    if (dict['livingStatus'].active == true) {
        html = html + '<tr><td class=\'boldtd\'>' + dict['livingStatus'].title + '</td><td>' + dict['livingStatus'].textValue + '</td></tr>';
    }
    if (dict['residencyStatus'].active == true) {
        html = html + '<tr><td class=\'boldtd\'>' + dict['residencyStatus'].title + '</td><td>' + dict['residencyStatus'].textValue + '</td></tr>';
    }
    
    // Step 3
    if (dict['maritalStatus'].active == true) {
        html = html + '<tr><td class=\'boldtd\'>' + dict['maritalStatus'].title + '</td><td>' + dict['maritalStatus'][dict['maritalStatus'].intValue] + '</td></tr>';
    }
    if (dict['numberOfChildren'].active == true) {
        html = html + '<tr><td class=\'boldtd\'>' + dict['numberOfChildren'].title + '</td><td>' + dict['numberOfChildren'][dict['numberOfChildren'].intValue] + '</td></tr>';
    }
    
    // Step 4 & 5
    if (dict['numberInFamily'].active == true) {
        html = html + '<tr><td class=\'boldtd\'>' + dict['numberInFamily'].title + '</td><td>' + dict['numberInFamily'].textValue + '</td></tr>';
    }
    if (dict['numberInCollege'].active == true) {
        html = html + '<tr><td class=\'boldtd\'>' + dict['numberInCollege'].title + '</td><td>' + dict['numberInCollege'].textValue + '</td></tr>';
    }
    if (dict['householdIncome'].active == true) {
        html = html + '<tr><td class=\'boldtd\'>' + dict['householdIncome'].title + '</td><td>' + dict['householdIncome'][dict['householdIncome'].intValue] + '</td></tr>';
    }
    var dv_summary = document.getElementById('dv_summary');
    dv_summary.innerHTML = html +  '</table>';
}

// Function displays bunner of institution
function setupBanner() {
    var imgInstitutionBanner = document.getElementById('imgInstitutionBanner');
    var divInstitutionBanner = document.getElementById('divInstitutionBanner');

    if(imgInstitutionBanner)
    {
        imgInstitutionBanner.src = 'images/' + bannerFileName;
        if(divInstitutionBanner)                
            divInstitutionBanner.style.display = '';                
    }
}



function HideAllSteps() {
    var dv_npc_s1_t = document.getElementById("dv_npc_s1_t");
    if(dv_npc_s1_t)
        dv_npc_s1_t.style.display = 'none';

    var dv_npc_s2_t = document.getElementById("dv_npc_s2_t");
    if(dv_npc_s2_t)
        dv_npc_s2_t.style.display = 'none';
    
    var dv_npc_s3_t = document.getElementById("dv_npc_s3_t");
    if(dv_npc_s3_t)
        dv_npc_s3_t.style.display = 'none';
    
    var dv_npc_s4_t = document.getElementById("dv_npc_s4_t");
    if(dv_npc_s4_t)
        dv_npc_s4_t.style.display = 'none';
    
    var dv_npc_s5_t = document.getElementById("dv_npc_s5_t");
    if(dv_npc_s5_t)
        dv_npc_s5_t.style.display = 'none';
    
    var dv_npc_s6_t = document.getElementById("dv_npc_s6_t");
    if(dv_npc_s6_t)
        dv_npc_s6_t.style.display = 'none';
    
    var dv_npc_s7_t = document.getElementById("dv_npc_s7_t");
    if(dv_npc_s7_t)
        dv_npc_s7_t.style.display = 'none';
    
    var dv_npc_s7_r = document.getElementById("dv_npc_s7_r");
    if(dv_npc_s7_r)
        dv_npc_s7_r.style.display = 'none';
    
    var dv_npc_s0 = document.getElementById("dv_npc_s0");
    if(dv_npc_s0)
        dv_npc_s0.style.display = 'none';
    
    var dv_npc_s1 = document.getElementById("dv_npc_s1");
    if(dv_npc_s1)
        dv_npc_s1.style.display = 'none';

    var dv_npc_s2 = document.getElementById("dv_npc_s2");
    if(dv_npc_s2)
        dv_npc_s2.style.display = 'none';
    
    var dv_npc_s3 = document.getElementById("dv_npc_s3");
    if(dv_npc_s3)
        dv_npc_s3.style.display = 'none';
    
    var dv_npc_s4 = document.getElementById("dv_npc_s4");
    if(dv_npc_s4)
        dv_npc_s4.style.display = 'none';
    
    var dv_npc_s5 = document.getElementById("dv_npc_s5");
    if(dv_npc_s5)
        dv_npc_s5.style.display = 'none';
    
    var dv_npc_s6 = document.getElementById("dv_npc_s6");
    if(dv_npc_s6)
        dv_npc_s6.style.display = 'none';
    
    var dv_npc_s7 = document.getElementById("dv_npc_s7");
    if(dv_npc_s7)
        dv_npc_s7.style.display = 'none';
}



function ResetForm() {
    var imgJavaScriptNote = document.getElementById('imgJavaScriptNote');
    if(imgJavaScriptNote) {
        imgJavaScriptNote.style.display = '';
    }
    ResetTextBox("First_Name");
    ResetTextBox("Last_Name");
    ResetTextBox("Address");
    ResetTextBox("First_Name");
    ResetTextBox("City");
    ResetTextBox("State");
    ResetTextBox("Zip");
    ResetTextBox("Home_Phone");
    ResetTextBox("Cell_Phone");
    ResetTextBox("Email");
    ResetTextBox("HS_Grad_Year");


    // 1
    ResetRadioButton("rb_financialaid");
    ResetTextBox("txt_age");
    ResetRadioButton("rb_livingstatus");
    ResetRadioButton("rb_residencystatus");
    // 2
    ResetRadioButton("rb_maritalstatus");
    ResetRadioButton("rb_numberofchildren");
    // 3
    ResetRadioButton("rb_numinfamily_dep");
    ResetRadioButton("rb_numincollege_dep");
    ResetRadioButton("rb_householdincome_dep");
    // 4
    ResetRadioButton("rb_indnuminfamily");
    ResetRadioButton("rb_indnumincollege");
    ResetRadioButton("rb_householdincome_ind");
    
    // 6
    ResetSpan("s_step7_body");
}


function StartOver() {
    ResetForm();
    ClearVars();
    GoTo("0");
}

// function executes when user clicks 'Modify' button        
function ClearVars() {           
    npc_step = "0";
    currentstepid = "0";
    
    // set active=false to 'dict' variable
    for(propertyName in dict) {
        if(typeof(dict[propertyName]) !== 'function') {
            dict[propertyName].active = false;
            if (dict[propertyName].intValue)
                dict[propertyName].intValue = 0;
            if (dict[propertyName].textValue)
                dict[propertyName].textValue = '';
        }
    }
    // setup initial constants
    SetupConstants();            
}

function ResetSpan(s) {
    if (s) {
        var sid = document.getElementById(s);
        if (sid) {
            sid.innerHTML = "";
        }
    }
}

function ResetRadioButton(rb) {
    if (rb) {
        var n = document.getElementsByName(rb);
        if (n) {
            for (var i = 0; i < n.length; i++) {
                n[i].checked = false;
            }
        }
    }
}

function ResetTextBox(t) {
    if (t) {
        var txt = document.getElementById(t);
        if (txt) {
            txt.value = "";
        }
    }
}

function GetRadioButtonValues(rb) {
    if (rb) {
        var n = document.getElementsByName(rb);
        if (n) {
            for (var i = 0; i < n.length; i++) {
                if (n[i].checked) {
                    return {label:n[i],value:n[i].value};
                }
            }
        }
    }
    return {value:"",label:""};
}

function GetSelectBoxValue(s) {
  if(s) {
    var e = document.getElementById(s);
    if(e) {
      return e.options[e.selectedIndex].text;
    }
  }
}

function GetTextBoxValue(t) {
    if (t) {
        var txt = document.getElementById(t);
        if (txt) {
            return txt.value;
        }
    }
}       

function IsInteger(sText)
{
    var ValidChars = "0123456789";
    var IsNumber = true;
    var Char;

    for (i = 0; i < sText.length && IsNumber == true; i++) {
        Char = sText.charAt(i);
        if (ValidChars.indexOf(Char) == -1) {
            IsNumber = false;
        }
    }
    return IsNumber;
}

function IsNumeric(sText) {
    var ValidChars = "0123456789.";
    var IsNumber = true;
    var Char;

    for (i = 0; i < sText.length && IsNumber == true; i++) {
        Char = sText.charAt(i);
        if (ValidChars.indexOf(Char) == -1) {
            IsNumber = false;
        }
    }
    return IsNumber;
}

function formatCurrency(num) {
    num = num.toString().replace(/\$|\,/g, '');
    if (isNaN(num))
        num = "0";
    sign = (num == (num = Math.abs(num)));
    num = Math.floor(num * 100 + 0.50000000001);
    cents = num % 100;
    num = Math.floor(num / 100).toString();
    if (cents < 10)
        cents = "0" + cents;
    for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
        num = num.substring(0, num.length - (4 * i + 3)) + ',' +
    num.substring(num.length - (4 * i + 3));
    return (((sign) ? '' : '-') + '$' + num ); //+ '.' + cents
}

function HideTag(ptr) {
    if (ptr) {
        var ptrHandle = document.getElementById(ptr);
        if (ptrHandle) {
            ptrHandle.style.display = "none";
        }
    }
}

function ShowTag(ptr) {
    if (ptr) {
        var ptrHandle = document.getElementById(ptr);
        if (ptrHandle) {
            ptrHandle.style.display = "block";
        }
    }
}

function closeInstitutionNameWindow() {
    var divInstitutionNameWindow = document.getElementById('divInstitutionNameWindow');
    if (divInstitutionNameWindow)
        divInstitutionNameWindow.style.display = 'none';

}

function openInstitutionNameWindow() {
    /*if(showWelcomeMessage && showWelcomeMessage == true)
    {
        var divInstitutionNameWindow = document.getElementById('divInstitutionNameWindow');
        if (divInstitutionNameWindow)
            divInstitutionNameWindow.style.display = '';
    }*/
}


function submitValues() {
  var values = {};
  jQuery.each(dict, function(index,value) {
    if(value.active) {
      values[index]= JSON.stringify(value);
    }
  });
  console.log(values);
  jQuery.post('/net-price-calculator/submit',   values, function(ret) {
    console.log(ret);
    if(ret['errors']) {
      alert(ret.errors);
    }
  });
}