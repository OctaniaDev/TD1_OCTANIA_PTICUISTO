﻿<?php
// E.Porcq  pdo_oracle.php  11/10/2016

function OuvrirConnexionPDO($db,$db_username,$db_password)
{
	try
	{
		$conn = new PDO($db,$db_username,$db_password);
		$res = true;
	}
	catch (PDOException $erreur)
	{
		echo $erreur->getMessage();
	}
	return $conn;
}

//---------------------------------------------------------------------------------------------
function majDonneesPDO($conn,$sql) // requêtes insert, update, delete non préparées
{
	$stmt = $conn->exec($sql);
	return $stmt;
}

//---------------------------------------------------------------------------------------------
function preparerRequetePDO($conn,$sql) // pour les requêtes préparées
{
	$cur = $conn->prepare($sql);
	return $cur;
}

//---------------------------------------------------------------------------------------------
function ajouterParamPDO($cur,$param,&$contenu,$type='texte',$taille=0) // fonctionne avec preparerRequetePDO
{

	if ($type == 'nombre')
	{
		$cur->bindParam($param, $contenu, PDO::PARAM_INT|PDO::PARAM_INPUT_OUTPUT, $taille);
	}
	else
	{
		$cur->bindParam($param, $contenu, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, $taille);
	}
	return $cur;
}

//---------------------------------------------------------------------------------------------
function majDonneesPrepareesPDO($cur) // fonctionne avec ajouterParamPDO
{
	$res = $cur->execute();
	return $res;
}

//---------------------------------------------------------------------------------------------
function majDonneesPrepareesTabPDO($cur,$tab) // fonctionne directement après preparerRequetePDO
{
	$res = $cur->execute($tab);
	return $res;
}

//---------------------------------------------------------------------------------------------
function LireDonneesPDO1($conn,$sql,&$tab) // requêtes select non préparées
{
	$i=0;
	foreach($conn->query($sql,PDO::FETCH_ASSOC) as $ligne)     
		$tab[$i++] = $ligne;
	$nbLignes = $i;
	return $nbLignes;
}

//---------------------------------------------------------------------------------------------
function LireDonneesPDOPreparee($cur,&$tab) // requêtes select  préparées
{
  $res = $cur->execute();
  $tab = $cur->fetchall(PDO::FETCH_ASSOC);
  return count($tab);
}

function afficherTab($obj)
	{
		echo "<PRE>";
		print_r($obj);
		echo "</PRE>";
	}
 ?>