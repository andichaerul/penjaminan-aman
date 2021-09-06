<?php
function noSurat($id_user, $id_pengajuan, $tgl_pengajuan)
{
	$tglRep = str_replace("-", "", $tgl_pengajuan);
	return "SPA{$id_user}{$id_pengajuan}{$tglRep}";
}
