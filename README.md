# TugasRPL_restAPI_Kel6
Anggota:
Alvin Arrazy (21120118130055) <br />
Hafizh Nafian (21120118130054) <br />
Aldy Sufrianto (21120118120021) <br />
Syafiqul Mahdi (21120118110002) <br />
Benecditus Steven Hanantyo (21120118130057) <br />
<br />
# API List: <br />
READ <br />
http://localhost/TugasRPLBK_restAPI_Kel6/mahasiswa/read.php <br />
<br />
CREATE <br />
http://localhost/TugasRPLBK_restAPI_Kel6/mahasiswa/create.php <br />
dengan post parameter <br />
{<br />
    "nama": "NAMA_BARU",<br />
    "angkatan": "ANGKATAN_BARU"<br />
}
<br />
DELETE<br />
http://localhost/TugasRPLBK_restAPI_Kel6/mahasiswa/delete.php<br />
dengan post parameter 
{<br />
    "nim": "NIM_MAHASISWA"<br />
}<br />
<br />
UPDATE<br />
http://localhost/TugasRPLBK_restAPI_Kel6/mahasiswa/update.php<br />
dengan post parameter<br />
{<br />
    "nama": "NAMA_BARU_UPDATE",<br />
    "angkatan": "ANGKATAN_BARU_UPDATE"<br />
}<br />
<br />
SEARCH<br />
http://localhost/TugasRPLBK_restAPI_Kel6/mahasiswa/search.php?s=DATA_YANG_DICARI<br />
