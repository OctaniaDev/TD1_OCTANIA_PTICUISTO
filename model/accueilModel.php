<?php 

class AccueilModel {

    private $connection;

    public function __construct ($connection){
        $this->connection = $connection;
    }

	public function recupererRecettesRecentes() {
		$req = "SELECT * FROM CUI_RECETTE JOIN CUI_CATEGORIE USING(CAT_ID) where REC_STATUS = 1 order by REC_DATE_CREATION desc LIMIT 0,3";
        $cur = preparerRequetePDO($this->connection, $req);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
	}

	public function recupererEdito(){
		$req = "select * from CUI_EDITO";
        $cur = preparerRequetePDO($this->connection, $req);
        LireDonneesPDOPreparee($cur, $tab);
        return $tab;
	}

    public function modiferEdito($edito) {
        $req = "update CUI_EDITO set EDI_CONTENU = :edito";
        $cur = preparerRequetePDO($this->connection, $req);
        ajouterParamPDO($cur, ':edito', $edito);
        return majDonneesPrepareesPDO($cur);
    }
}