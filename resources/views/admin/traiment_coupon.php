<?php
    require_once '../models/dao.php';

function nombre_echecs_graves($liste_cotes)
{
    $nombre = 0;
    foreach($liste_cotes as $cote) if($cote->mention < 8) $nombre++;
    return $nombre;
}

function nombre_echecs_legers($liste_cotes)
{
    $nombre = 0;
    foreach($liste_cotes as $cote) if($cote->mention == 8 || $cote->mention == 9) $nombre++;
    return $nombre;
}

function pourcentage1($id_et,$cote,$totalpour)
{
    $pourcentage = 0;
    $echecleger = 0;
    $echecgrave = 0;
    $total = 0;
    if($cote->mention < 8){
        $echecgrave++;
    }
    if ($cote->mention == 8 || $cote->mention == 9)
    {
        $echecleger++;
    }
    foreach ($cote as $value){
        $pourcentage+= ($value->ponderation * 20);
    }



    //$calcul += ($cote * $ponderation);
    //$total += $calcul;




    return $value;
}

function pourcentage($liste_cours, $liste_cotes)
{
    $total = 0;
    $pourcentage = 0;

    foreach($liste_cours as $cours)
    {
        $total += ($cours->ponderation * 20);
    }

    if($total == 0)
    {
        $total = 1;
    }

    foreach($liste_cotes as $cote)
    {
        $mention = 0;
        if($cote->mention != null) $mention = $cote->mention;

        foreach($liste_cours as $cours)
        {
            if($cote->id_cours == $cours->id_cours)
            {
                $mention *= $cours->ponderation;
                break;
            }
        }
        $pourcentage += $mention;
    }

    return round($pourcentage * 100 / $total);
}

function liste_cotes_perequetion($liste_cours, $liste_cotes)
{
    $fait = 0; $nouvelle_liste_cotes = array();
    foreach($liste_cotes as $cote)
    {
        $c = new Cote(); $c->mention = $cote->mention;
        $c->id_cours = $cote->id_cours; $nouvelle_liste_cotes[] = $c;
    }
    foreach($nouvelle_liste_cotes as $cote)
    {
        if($fait == 2) break;
        if($cote->mention < 8)
        {
            $le_cours = new Cours();
            foreach($liste_cours as $cours)
            {
                if($cote->id_cours == $cours->id)
                {
                    $le_cours = $cours;
                    break;
                }
            }
            foreach($nouvelle_liste_cotes as $autre_cote)
            {
                if($autre_cote->mention > 12)
                {
                    $autre_cours = new Cours();
                    foreach($liste_cours as $cours)
                    {
                        if($autre_cote->id_cours == $cours->id)
                        {
                            $autre_cours = $cours;
                            break;
                        }
                    }
//                    if($le_cours->ponderation == $autre_cours->ponderation)
//                    {
//                        for($i = 7; $i >= 0; $i--)
//                        {
//                            if($cote->mention == $i && $autre_cote->mention >= (20 - $i))
//                            {
//                                $cote->mention += ($autre_cote->mention - 10);
//                                $autre_cote->mention -= ($autre_cote->mention - 10);
//                                $fait++;
//                                break;
//                            }
//                        }
//                        break;
//                    }
                }
            }
        }
    }
    foreach($nouvelle_liste_cotes as $cote)
    {
        if($fait == 2) break;
        if($cote->mention == 9 || $cote->mention == 8)
        {
            $le_cours = new Cours();
            foreach($liste_cours as $cours)
            {
                if($cote->id_cours == $cours->id)
                {
                    $le_cours = $cours;
                    break;
                }
            }
            foreach($nouvelle_liste_cotes as $autre_cote)
            {
                if($autre_cote->mention > 10)
                {
                    $autre_cours = new Cours();
                    foreach($liste_cours as $cours)
                    {
                        if($autre_cote->id_cours == $cours->id)
                        {
                            $autre_cours = $cours;
                            break;
                        }
                    }
//                    if($le_cours->ponderation == $autre_cours->ponderation)
//                    {
//                        for($i = 9; $i >= 8; $i--)
//                        {
//                            if($cote->mention == $i && $autre_cote->mention >= (20 - $i))
//                            {
//                                $cote->mention += ($autre_cote->mention - 10);
//                                $autre_cote->mention -= ($autre_cote->mention - 10);
//                                $fait++;
//                                break;
//                            }
//                        }
//                        break;
//                    }
                }
            }
        }
    }
    return $nouvelle_liste_cotes;
}

function decision($pourcentage, $liste_cotes, $liste_cours)
{
    if($pourcentage < 40)
    {
        foreach($liste_cotes as $cote)
        {
            if($cote->mention == null) return "ANAF";
        }
        return "NAF";
    }
    else if($pourcentage >= 40 && $pourcentage < 50 )
    {
        foreach($liste_cotes as $cote)
        {
            if($cote->mention == null) return "AA";
        }
        return "A";
    }
    else if($pourcentage >= 50 && $pourcentage < 55)
    {
        $grave = nombre_echecs_graves($liste_cotes);

        if($grave > 1)
        {
            foreach($liste_cotes as $cote)
            {
                if($cote->mention == null) return "AA";
            }
            return "A";
        }
        else
        {
            $leger = nombre_echecs_legers($liste_cotes);

            if($leger <= 1)
            {
                foreach($liste_cotes as $cote)
                {
                    if($cote->mention == null)
                    {
                        foreach($liste_cours as $cours)
                        {
                            if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                                return "AA";
                        }
                        foreach($liste_cours as $cours)
                        {
                            if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                                return "A".strtoupper($cours->intitule);
                        }
                    }
                }
                return "S";
            }
            else
            {
                foreach($liste_cotes as $cote)
                {
                    if($cote->mention == null) return "AA";
                }
                if($grave = 0 && $leger <= 2) return "S";
                return "A";
            }
        }
    }
    else if($pourcentage >= 55 && $pourcentage < 60)
    {
        $grave = nombre_echecs_graves($liste_cotes);
        $leger = nombre_echecs_legers($liste_cotes);

        if($grave > 1)
        {
            if($leger == 0 && $grave == 2)
            {
                foreach($liste_cotes as $cote)
                {
                    if($cote->mention == null)
                    {
                        foreach($liste_cours as $cours)
                        {
                            if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                                return "AA";
                        }
                        foreach($liste_cours as $cours)
                        {
                            if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                                return "A".strtoupper($cours->intitule);
                        }
                    }
                }
                return "S";
            }
            else
            {
                foreach($liste_cotes as $cote)
                {
                    if($cote->mention == null)
                    {
                        foreach($liste_cours as $cours)
                        {
                            if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                                return "AA";
                        }
                        foreach($liste_cours as $cours)
                        {
                            if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                                return "A".strtoupper($cours->intitule);
                        }
                    }
                }
                return "A";
            }
        }
        else
        {
            if($leger <= 1)
            {
                foreach($liste_cotes as $cote)
                {
                    if($cote->mention == null)
                    {
                        foreach($liste_cours as $cours)
                        {
                            if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                                return "AA";
                        }
                        foreach($liste_cours as $cours)
                        {
                            if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                                return "A".strtoupper($cours->intitule);
                        }
                    }
                }
                return "S";
            }
            else
            {
                if($grave = 0 && $leger <= 2)
                {
                    foreach($liste_cotes as $cote)
                    {
                        if($cote->mention == null)
                        {
                            foreach($liste_cours as $cours)
                            {
                                if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                                    return "AA";
                            }
                            foreach($liste_cours as $cours)
                            {
                                if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                                    return "A".strtoupper($cours->intitule);
                            }
                        }
                    }
                    return "S";
                }
                else
                {
                    foreach($liste_cotes as $cote)
                    {
                        if($cote->mention == null)
                        {
                            foreach($liste_cours as $cours)
                            {
                                if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                                    return "AA";
                            }
                            foreach($liste_cours as $cours)
                            {
                                if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                                    return "A".strtoupper($cours->intitule);
                            }
                        }
                    }
                    return "A";
                }
            }
        }
    }
    else if($pourcentage >= 60 && $pourcentage < 70)
    {
        foreach($liste_cotes as $cote)
        {
            if($cote->mention == null)
            {
                foreach($liste_cours as $cours)
                {
                    if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                        return "C";
                }
                foreach($liste_cours as $cours)
                {
                    if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                        return "A".strtoupper($cours->intitule);
                }
            }
        }
        return "S";
    }
    else if($pourcentage >= 70 && $pourcentage < 80)
    {
        foreach($liste_cotes as $cote)
        {
            if($cote->mention == null)
            {
                foreach($liste_cours as $cours)
                {
                    if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                        return "C";
                }
                foreach($liste_cours as $cours)
                {
                    if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                        return "A".strtoupper($cours->intitule);
                }
            }
        }
        return "D";
    }
    else
    {
        foreach($liste_cotes as $cote)
        {
            if($cote->mention == null)
            {
                foreach($liste_cours as $cours)
                {
                    if($cours->id == $cote->id_cours && strtolower($cours->intitule) != "tfc" && strtolower($cours->intitule) != "stage" && strtolower($cours->intitule) != "memoire")
                        return "C";
                }
                foreach($liste_cours as $cours)
                {
                    if($cours->id == $cote->id_cours && (strtolower($cours->intitule) != "tfc" || strtolower($cours->intitule) != "stage" || strtolower($cours->intitule) != "memoire"))
                        return "A".strtoupper($cours->intitule);
                }
            }
        }
        return "GD";
    }
}

function totalponderation($list_cours){
    $total = 0;

    foreach ($list_cours as $cour){
        $total += ($cour->ponderation * 20);
    }

    return $total;
}

?>