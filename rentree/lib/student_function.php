<?php
	
	function trie_list_annee($listnontrie){
		$annee = array('A1','A2','A3','A4','A5');
		$listetrie = array();
		foreach ($annee as $key => $value) {
			foreach ($listnontrie as $keylist => $valuelist) {
				if (stristr($valuelist, $value)) {
					$listetrie[] = $valuelist;
				}
			}
		}
		return $listetrie;
	}


	function optionField($list){
		$libelle='<option value=""></option>';
		foreach ($list as $key => $value) {
			$libelle= $libelle . '<option value="'.$value.'">';
			switch ($value) {
				case CSI_A1:
					$libelle = $libelle . CSI_A1_LIBELLE;
					break;
				
				case CIR_BREST_A1:
					$libelle = $libelle . CIR_BREST_A1_LIBELLE;
					break;
				
				case CIR_RENNES_A1:
					$libelle = $libelle . CIR_RENNES_A1_LIBELLE;
					break;
				
				case BTSPREPA_A1:
					$libelle = $libelle . BTSPREPA_A1_LIBELLE;
					break;
				
				case CSI_A2:
					$libelle = $libelle . CSI_A2_LIBELLE;
					break;
				
				case CIR_BREST_A2:
					$libelle = $libelle . CIR_BREST_A2_LIBELLE;
					break;
				
				case CIR_RENNES_A2:
					$libelle = $libelle . CIR_RENNES_A2_LIBELLE;
					break;
				
				case BTSPREPA_A2:
					$libelle = $libelle . BTSPREPA_A2_LIBELLE;
					break;
				
				case CSI_A3:
					$libelle = $libelle . CSI_A3_LIBELLE;
					break;
				
				case CIR_A3_ALT:
					$libelle = $libelle . CIR_A3_ALT_LIBELLE;
					break;
				
				case CIR_A3_NONALT:
					$libelle = $libelle . CIR_A3_NONALT_LIBELLE;
					break;
				
				case ITII_A3:
					$libelle = $libelle . ITII_A3_LIBELLE;
					break;
				
				case M_A4:
					$libelle = $libelle . M_A4_LIBELLE;
					break;
				
				case ITII_A4:
					$libelle = $libelle . ITII_A4_LIBELLE;
					break;
				
				case M_A5_ALT:
					$libelle = $libelle . M_A5_ALT_LIBELLE;
					break;
				
				case M_A5_NONALT:
					$libelle = $libelle . M_A5_NONALT_LIBELLE;
					break;
				
				case ITII_A5:
					$libelle = $libelle . ITII_A5_LIBELLE;
					break;
				
				default:
					$libelle = $libelle . "PAS DE CORRESPONDANCES CHANGEZ LES, OU CREEZ LES DANS LIB/CONF.PHP";
					break;
			}
			$libelle = $libelle . '</option>';
		}
		return $libelle;
	}
?>