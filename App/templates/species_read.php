<!-- <link rel="stylesheet" href="../dist/style.css"> -->

    <div class="group">
       <?php

function readSpecies($species)
{
    $spec = '<option value="" selected hidden disabled>' . $species . '</option>';
    $speciesSelection = [
        "Bamboo",
        "Exotic",
        "Fruit Trees",
        "Indigenous",
        "Mangrooves",
    ];

    foreach ($speciesSelection as $selection) {
        if ($species == $selection) {
            $spec .= '<option value="' . $selection . '" selected>' . $selection . '</option>';
        } else {
            $spec .= '<option value="' . $selection . '">' . $selection . '</option>';
        }

    }
    return $spec;
}
function readOptions($cat)
{
    $options = '<option value="" selected hidden disabled>' . $cat . '</option>';

    $speciesNames = ["Aberia caffra", "Acacia abyssinica", "Acacia brevispica", "Acacia drepanolobium", "Acacia elatior", "Acacia gerrardii", "Acacia hockii", "Acacia lahai", "Acacia melanoxylon", "Acacia mellifera", "Acacia nilotica", "Acacia nubica", "Acacia polyacantha", "Acacia reficiens", "Acacia senegal", "Acacia seyal", "Acacia sieberiana", "Acacia tortilis", "Acacia xanthophloea", "Acalypha fruticosa", "Acalypha spiciflora", "Achyrospermum schimperi", "Acokanthera oppositifolia", "Acokanthera schimperi", "Acrocapus flaxinifolia", "Acrocarpus flaxinfolia", "Adansonia digitata", "Adenanthera pavonina", "Adenia bequaertii", "Adenocarpus mannii", "Aeschynomene abyssinica", "Afrocrania volkensii", "Afzelia quanzensis", "Agauria salicifolia", "Alangium chinense", "Albizia advanthifolia", "Albizia glaberrima", "Albizia gummifera", "Albizia harveyi", "Allophylus abyssinicus", "Allophylus ferrugineus", "Anacardium excelsum", "Anacardium occidentale", "Aningeria adolfi-friedericii", "Annona cherimola", "Annona species", "Annonasenegalensis ", "Anthocleista grandiflora", "Apodytes dimidiata", "Araucaria Cunninghamii", "Areca catechu", "Artocarpus heterophyllus", "Artocarpus heterophyllus(JackFruit Trees)", "Arundinaria Alpina", "Avicennia marina", "Avicenniamarina(Forsk)Vierh", "Azacrachta indica", "Azadirachta indica", "Balanites Wilsoniana", "Balanites aegyptiaca", "Balanites glabra", "Balanitesaegyptiaca", "Bambusa bambos", "Bambusa tulda", "Bersama abyssinica", "Bischovia javonica", "Boscia angustifolia", "Brachyleana Huillensis", "Brachystegia spiciformis", "Bridelia micrantha", "Bridelia scleroneura", "Bruguiera gymnorrhiza", "Bruguieragmnorrhiza(Lam)", "Cadaba farinosa", "Calitris robusta", "Calliandra calothyrsus", "Callistemon Citrinus", "Callistemon lanceolatus", "Calodendrum capense", "Canthium kilifiensis", "Canthium lactescens", "Canthium mombazense", "Capparis fascicularis", "Capparis tomentosa", "Caribia  Brevicaudata", "Carica papaya", "Carissa edulis", "Carissa spinarum", "Carissa tetramera", "Carpodiptera africana", "Casearia battiscombei", "Casimiroa edulis", "Cassia siamea", "Cassia spectabilis", "Cassipourea euvyoides", "Cassipourea malosana", "Cassipourea ruwensorensis", "Casualina equisetifolia", "Casuana equisetifolia", "Casuarina equestifolia", "Casuarina equisetifolia", "Catunaregam nilotica", "Ceiba speciosa", "Celtis africana", "Ceriops tagal", "Ceriops tagal(C.B Rob)", "Chaetacme aristata", "Chassalia subochreata", "Chazeliella abrupta", "Cinnamomum camphora", "Cissus quadrangularis", "Cissus rotundifolia", "Citrus aurantiifolia", "Citrus aurantium", "Citrus limon", "Clematis brachiata", "Clematis simensis", "Clerodendrum johnstonii", "Clerodendrum myrianthum", "Clerodendrum rotundifolium", "Clutia abyssinica", "Cocos nucifera", "Coffea eugenoides", "Combretum butyrosum", "Combretum coustrictum", "Combretum illairii", "Combretum molle", "Combretum schumanii", "Commiphora eminii", "Conocarpus lancifolius", "Cordia abyssinica", "Cordia monoica", "Cordia sinensis", "Cotyledon barbeyi", "Craibia zimmermanii", "Crotalaria lachnocarpoides", "Croton dichogamus", "Croton macrostachyus", "Croton megalocarpus", "Croton pseudopulchellus", "Cuppressus Iusitanica", "Cuppressus lusitanica", "Cupressus lusitanica", "Cussonia holstii", "Cussonia spicata", "Cussonia zimmermannii", "Cyathea manniana", "Cynometra webberi", "Cyphostemma cyphopetalum", "Dalbergia Melonoxylon", "Deinbollia kilimandscharica", "Delonix regia", "Dendrocalamus asper", "Dendrocalamus memranaceus", "Dendrocalamus strictus", "Dialium ovientale", "Diospyros abyssinica", "Dobera glabra", "Dodonaea viscosa", "Dombeya burgessiae", "Dombeya kirkii", "Dombeya torrida", "Dovyalis abyssinica", "Dovyalis caffra", "Dovyalis cafra", "Dovyalis macrocalyx", "Dovyalisabyssianica", "Dovyaliscaffra", "Dracaena afromontana", "Dracaena ellenbeckiana", "Drypetes reticulata", "Ehretia bakeri", "Ehretia cymosa", "Ekebergia capensis", "Elaeodendron aquifolium", "Elaeodendron buchananii", "Embelia schimperi", "Entada rheedii", "Erica arborea", "Eriobotrya japonica", "Erythrina abyssinica", "Erythrococca bongensis", "Erythrococca fischeri", "Erythrophleum Suaveolens", "Eucalyptus camaldulensis", "Eucalyptus globulus", "Eucalyptus grandis", "Eucalyptus maculata", "Eucalyptus paniculata", "Eucalyptus saligna", "Eucalyptus tereticornis", "Euclea divinorum", "Euclea natalensis", "Eugenia sp nov. of KTS", "Euphorbia bussei", "Euphorbia candelabrum", "Euphorbia engleri", "Euphorbia gossypina", "Fagaropsis angolensis", "Faurea saligna", "Ficus benjamina", "Ficus bussei", "Ficus exasperata", "Ficus glumosa", "Ficus ingens", "Ficus natalensis", "Ficus ovata", "Ficus populifolia", "Ficus sansibarica", "Ficus sur", "Ficus sycomorus", "Ficus thonningii", "Ficus tremula", "Ficussycomorus", "Filicium decipiens", "Flueggea virosa", "Fraxinus pensylvanica", "Galiniera coffeoides", "Garcinia buchananii", "Garcinia volkensii", "Gardenia ternifolia", "Gardenia volkensii", "Gerrardanthus lobatus", "Gigantochloa aspera", "Gliricidia sepium", "Gmelina arborea", "Gnidia lamprantha", "Gnidia subcordata", "Grevillea robusta", "Grewia bicolor", "Grewia forbesii", "Grewia microcarpa", "Grewia plagiophlla", "Grewia similis", "Grewia tembensis", "Grewia tenax", "Grewia villosa", "Hagenia abyssinica", "Halleria lucida", "Haplocoelum foliolosum", "Haplocoelum inoploeum", "Harungana madagascariensis", "Heinsenia diervillioides", "Helinus mystacinus", "Heritiera littoralis", "Heritieralittoralis(dryland(Isaac 1968)", "Heteromorpha trifoliata", "Hibiscus calyphyllus", "Hymeana verrucosa", "Hymenodictyom parvifolium", "Hypericum revolutum", "Hyphaene compressa", "Ilex mitis", "Indigofera arrecta", "Indigofera swaziensis", "Jacarada mimosaefolia", "Jasminum abyssinicum", "Jasminum floribundum", "Jatropha maltifidia", "Julbernadia Magnistipulata", "Juniperus procera", "Keetia gueinzii", "Kigelia africana", "Lamprothamnus zanguebarica", "Landolphia buchananii", "Landolphia kirkii", "Lannea schweinfurthii", "Lantana rhodesiensis", "Lasianthus kilimandscharicus", "Leonotis nepetifolia", "Lepidotrichilia volkensii", "Leucaena leucocephala", "Leucas calostachys", "Leucas glabrata", "Leucas grandis", "Leucena leucocephala", "Lippia javanica", "Lobelia gibbberoa", "Ludia discoidea", "Lumitzera racemosa", "Lumnitzera racemosa(Van steenis)", "Macadamia integrifolia", "Macaranga capensis", "Maerua decumbens", "Maerua triphylla", "Maesopsis eminii", "Majidea Zanguebarica", "Malkara sansibarensis", "Malkara sulcata", "Malus domestica(apple)", "Mangifera indica", "Mangifera inidica", "Manilkara sulcata", "Markhamia lutea", "Maytenus heterophylla", "Maytenus senegalensis", "Maytenus undata", "Melia azadirach", "Melia azadirachta", "Melia azadrach", "Melia volkesii", "Mellittia Usaramensis", "Memecylon sansibaricum", "Memecylon sp. Nov. of KTS", "Microglossa pyrifolia", "Mikaniopsis usambarensis", "Miletia oblate", "Milicia excelsa", "Mimusops Somalensis", "Mimusops fruticosa", "Mimusops kummel", "Moringa oleifera", "Moringa stenopetala", "Morus alba", "Myrianthus holstii", "Myrica salicifolia", "Myrsine africana", "Mystroxylon aethiopicum", "Neoboutonia macrocalyx", "Newtonia hildebrandtii", "Newtonia paniculata", "Newtonia paucijuga", "Nuxia congesta", "Ochna holstii", "Ochna ovata", "Ochna thomasiana", "Ocimum lamiifolium", "Ocotea sp.", "Ocotea usambarensis", "Oldfieldia somalensis", "Olea Africana", "Olea capensis", "Olea europaea subsp.", "Olea hochsteterii", "Olea woodiana", "Olinia rochetiana", "Opuntia vulgaris", "Ormocarpum kirkii", "Osyris lanceolata", "Other Species", "Oxytenanthera abyssinica", "Ozoroa insignis", "Pachystela brevipes", "Pakinsonia aculeata", "Pappea capensis", "Parkinsonia aculeata", "Passiflora edulis", "Pauridiantha paucinervis", "Pavetta abyssinica", "Pavetta gardeniifolia", "Pavetta oliverana", "Pavonia kilimandscharica", "Pavonia urens", "Persea americana(Avocado)", "Persia americana", "Phamnus prinoides", "Phoenix reclinata", "Phoenixdactylifera", "Phyllanthus fischeri", "Phyllanthus ovalifolius", "Phyllanthus sepialis", "Phytolacca dodecandra", "Piliostigma thonningii", "Pinus Maximinoi", "Pinus Patula", "Pinus patula", "Pinus radiata", "Pinus tecumunii", "Piper capense", "Pistacia aethiopica", "Pithecellobium dulce", "Pittosporum lanatum", "Pittosporum viridiflorum", "Plectranthus luteus", "Pleurostylia africana", "Pluchea ovalis", "Podocarpus falcatus", "Podocarpus graciolor", "Podocarpus latifolius", "Polyalthia longifolia", "Polyathia stuhimannii", "Polyscias fulva", "Polyscias kikuyuensis", "Prosopis chillensis", "Prosopis juliflora", "Prunus africana", "Prunus africanus", "Pseudarthria hookeri", "Psiadia punctulata", "Psidium guajava", "Psidium guajava(Guava)", "Psychotria fractinervata", "Psychotria mahonii", "Psydrax faulknerea", "Psydrax parviflora", "Pteleopsis tetraptera", "Punica granatum(Pomegranate)", "Pyrus communis(pears)", "Rapanea melanophloeos", "Rauvolfia caffra", "Rawsonia lucida", "Rhamnus prinoides", "Rhamnus staddo", "Rhizophora mucronata", "Rhizophora mucronata(Lam)", "Rhoicissus tridentata", "Rhus natalensis", "Rhus vulgaris", "Rhynchosia hirta", "Ricinus communis", "Rothmannia urcelliformis", "Roystonea regia", "Rubus pinnatus", "Rubus steudneri", "Rubus volkensii", "Rutidea orientalis", "Rytigynia uhligii", "Salacia mombazense", "Salix subserrata", "Salvadora persica", "Sambucus africana", "Saraca Asoca", "Scelerocaryabirrea  ", "Schefflera abyssinica", "Schefflera volkensii", "Schrebera alata", "Scutia myrtina", "Secamone punctulata", "Secamone stuhlmannii", "Senna septemtrionalis", "Senna siamea", "Senna spectabilis", "Sesbania keniensis", "Solanecio mannii", "Solanum dennekense", "Solanum incanum", "Solanum indicum", "Solanum mauense", "Solanum terminale", "Sonneratia alba", "Sonneratiaalba(J.E Smith)", "Sparrmannia ricinocarpa", "Spathodea campanulata", "Sphaerocoryne gracilis", "Stephania abyssinica", "Strychnos henningsii", "Strychnos madagascariensis", "Stychnos Panganiensis", "Suregada procera", "Suvegada zanzibariensis", "Swietenia macrophylla", "Synadenium grantii", "Syzigium guineense", "Syzygium cordatum", "Syzygium cumini", "Syzygium guineense", "Syzygium guinense", "Tabernaemontana stapfiana", "Tamarindus indica", "Tarchonanthus camphoratus", "Tarenna graveolens", "Tebarnaemontana pachysiphon", "Teclea nobilis", "Teclea nobilis | Vepris nobilis", "Teclea simplicifolia | Vepris simplicifolia", "Teclea trichocarpa | Vepris trichocarpa", "Tecoma stans", "Tectona grandis", "Tephrosia interrupta", "Tephrosia vogelii", "Terminalia bolvinnii", "Terminalia brownii", "Terminalia catappa", "Terminalia mentalis", "Terminalia spinosa", "Thespesiagarckean", "Thevetia peruviana", "Thyrsostachys siamensia", "Toddalia asiatica", "Trema orientalis", "Trichilia emetic", "Trichilia emetica", "Trichocladus ellipticus", "Trimeria grandifolia", "Triumfetta tomentosa", "Turraea abyssinica", "Turraea holstii", "Urera hypselodendron", "Vangueria infausta", "Vangueria madagascariensis", "Vangueria madagascarriensis", "Vangueria volkensii", "Vernonia adoensis", "Vernonia auriculifera", "Vernonia brachycalyx", "Vernonia lasiopus", "Vernonia urticifolia", "Vitex Keniensis", "Vitex doniana", "Vitex keniensis", "Vitex payos", "Warburgia ugandensis", "Withania somnifera", "Ximenia americana", "Xylocarpus granatum", "Xylocarpus granatum(Koenig)", "Xylocarpus moluccensis", "Xylocarpus moluccensis(Lamk)Roem1846", "Xylopia Parvifolia", "Xymalos monospora", "Zanthoxylum gillettii", "Zanthoxylum usambarense", "Zizigium cuminii", "Ziziphus mucronata"];

    foreach ($speciesNames as $species) {
        if ($cat == $species) {
            $options .= '<option value="' . $species . '" selected>' . $species . '</option>';
        } else {
            $options .= '<option value="' . $species . '">' . $species . '</option>';
        }

    }
    return $options;
}

echo '<div class="species-group" id="grp-1"><span style="display:none" class="species_category"></span><select class="read speciesCat species-input mySpecies" name="speciesCat[]" required>' . readSpecies("-- species category --") . '</select><select  class="read species species-input  mySpecies" name="species[]" required>' . readOptions("-- species name --") . '</select><input type="text" class="seedsource-input mySpecies" name="seed_source[]" placeholder="e.g KEFRI" required>' .
    '<input type="number" min="0" class="quantity-input mySpecies" name="quantity[]" placeholder="Quantity" required>' .
    '<button type="button" class="minus" id="minus1" onclick="remove(this.getAttribute(\'id\'));">-</button><button style="color: green"  type="button" class="add" id="add1" onclick="populate(this.getAttribute(\'id\'));">+</button></div>';

?>

    </div>

