<?php
header('Access-Control-Allow-Origin:*');

try {
    require_once("connect_chd102g2.php");

    $type = $_POST["type"];
    $cusNo = $_POST["cusNo"];
    // $type = "giftcard";
    // $cusNo = "1";
    if ($type == "giftcard") {
        $reciveCusEmail = $_POST["reciveCusEmail"];
        $pic = $_POST["pic"];
        $money = $_POST["money"];
        // $reciveCusEmail = "Andy_Evans@freshdrop.com";
        // $money = "1000";
        // $pic = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAeAAAAEYCAYAAACEFSXhAAAAAXNSR0IArs4c6QAAIABJREFUeF7sfQd4ZEeV7n9j56RutXKWJuc84zCO2AzYYLCNbWDBNhjDLkvGjwV2vYthw1vYheUtYLLTsmSMjW0ccBx7PDP2ZE+SRhOUW6FzuuF9dXuSRqFvS31b3VIVnz4PUtWpU/+5t849p06dw6iqqmIKLSVL6Bjuxa6eDmw7dQiHBrtwKhhAKBmbAjU6hCJAEaAIUAQoAsWNgNNkRa3Lh/neGqyvnY/V1a1o9PghsPyUGGdyUcBE6T7dvgs/e/NpbO86MqUJ6SCKAEWAIkARoAjMJgQubVyCDyy7DJc1LYPI6VfGuhSwoqp4pmMXPvvEjxBJxWcTbnQtFAGKAEWAIkARyAsCdtGCb117J65uXQVGB8WsCrg7PIS/efx7eKO7fRS5Ja5yfKSyAZeZLLCkU+DlFLh0EpAlHdPSLhQBigBFgCJAESgxBDgesmCCxImICyJelST8sLsDb4z0jVrIquoWfHfL3ah2eidd4KQK+C/H9uD23/3nWQKtvIg7qxqxxe6CKxosMeQouxQBigBFgCJAEcg/AkGrG49Hgvhx3zG0p1NnJ/jv6z6BLW1rJpxwXAUsKwq++tyDeGTPC2cHLnB58V+189AWHsw/95QiRYAiQBGgCFAEShyBIw4fPnnqEA4Gz+nJm5dcgn+++kPgGHbM6sZVwN948ZfYTaKbuw5rA+5oXIwv8wK4FI1wLvHng7JPEaAIUAQoAgYiIItW/Kui4P6OPdos62vmYWP9Qnx647uyK+BnO3bjzt9/OzOwdj4+6PTgnbEgoMgGskxJUwQoAhQBigBFYJYgwHL4o9WNh4KDZw3Zn97waVzetGzUAkdZwCeCA7j0x/ec7fD9hetxbXR4liBCl0ERoAhQBCgCFIHCIfCkzYO739p2dsIX7/xX1LvKz/7/swqYZOO48RffwM7uo9ofP9GwGF+EBEwtT0fhVkhnoghQBCgCFAGKQDEiwDD4d/D47vH9Gnckccevb/m7s1eUzirgFzr34kO//Q+t0zp3OX5RVgFWOhfNVYxrozxRBCgCFAGKAEWgmBFQeBG3DvZhW3BAY/Pn7/kMNjcu1f6tKWAS9bz+/s8iEAtpv3x60Ua0RWi0czELlfJGEaAIUAQoAqWBwBG7F1cfeFVj1md1Yttd3wLHshkFfH7g1Y218/HvHKjruTTkSrmkCFAEKAIUgWJHgGHwSRn446lDGqc/fvencGXz8owCft8v/1UrqEDaa8s3o3K4p9iXQ/mjCFAEKAIUAYpAySDQU1aNjbue1/hdVzMPv3zf/wGTktJq27fv0n7Z6vLhGW8lQM9+S0aolFGKAEWAIkARKAEEeBGbAz04Hsoc7x751P1gDge61Kt//hXtF99YsA63xUaKaiWkWqJ6Oqs1owIMoyfFdVEtgTJDEaAIUAQoAhQBPGBz4+/fel1D4ukP3Qfm1/tfUT/35I+0X2xfdRXKAyeKAiaieJOqgpCURkyWISky7ByPMsEEkeMgqwpkTTkzIEfWHMOA/I82igBFgCJAEaAIFCMC/f4GrNvxtMbaN6/9CJh7n3tY/embz2i/OLDsElgvqOowU4sISinsCA3hpXAAPUhCViQ0qGZs8dag1ebEQDqBATkFmWXhYAT4eR42hoOF5SGwY3NuztQ66LwUAYoARYAiQBEgCMTcFVi05yUNjNtXXgXmtl/9X/WVEwe0X7TPXw0uHp4xpBSoSCsKZKjYGRrB02oI6UorBDuDtJpEuD+MpmEOZaqIk2ISYbsI3mqHGk/BFZNQk2KxxuRCq9UBkSV2MW0UAYoARYAiQBEoDgQkmwutb23XmLmofhGY1d//lBqIZu7/djYuNDbnMzm/nSCzFlG8vakYjsbCSCgyOtQ0+iqcqG2oRiQdxnAigHgqgfhgDCZWgL3MAYUnbmgZLDgw5KA4IaG2R8ZFrBtNNicsLDtuBYriEAXlgiJAEaAIUAQKicC3+3fjlegARNaBap5FhSBisdmJtdZKeHmL8awIJjS279Xm8dmcYBq+eTvJQplRwPXzjGOAuIVZHlAVQJbOzkPOehUydyyC3w2fwg41BLOJB88J8Fb5UV7uRDwdQ1JJQlEViIygXWAGOBBbWVIkcEzG2iX/Dp8IwT4iYZXgxEWucvhNFrCFOhsm5aZ4ARBMAMtCJesl2U7AgKySIQUtZBlIJ2mkuXFPWoYyy0ElcuB4MBwPMKwWL8BoH4Cq9qGpptNg5DSVhdGyIO8E+eFE7b04KwtNDmQ/kAElDaSSxhoARq+zFOgLJqi8AIbloXIcGJC9VCWS0PYnVZHASOSdILI4qxpKYWWT8jgkJ/CD/jfw9YFBxMkzd15zcCw+4nHivZ5WbLTVGL7WxhOZKoOabiicAua0zVCzgBUJKgmsUlUMppLoSyWwPxbGDjEGvt6a6aYwEEkJRJ6Dqiow8WawDIu0kslPTaKhyf/XFLiqICknIClppNMy4tE0UsfDuNVag01uP8xcHt3RNhdUmxuwuQCLA7A6oZqtgMkGmMyAYNYnwGQcSMXBJKIA+SGu/1gITDQIkAIY8ag+OnO1F9nI7R7A5oZKZGJxgDHboVrsgMkCmKyZ5y1bIx9FZONPRsEkY1DjYTDkh2SFi4wA0ZHM32mbEAHyocOQd8Luhmp1QLU4wZCjIe2dsAKiJaN4szXyYU5KnpJ3Ix7RfjKyCAIR8jNMFXQ2DE02qA43YHVpexOsDoC8F2ZbRg7k3dDTiJGQTGjvBdmfiBy0/en890IPnSLp8/DQPjwTHsEDw+NneKziRfy1z4UvVW4ynOMZUsCnLWCGgarIiCbjaE+E8XxwAK9EBxGFBMHKw1fphNtthUkUwLPE2uUhqxJEzgyRJRHQIhRISEpJ7btNU75SEik5obmjiX6PRBIIHQ9hi1iBSxx+VJksUzsTFs1QXeVg3H6oTh9UpxdweMldKGOFRO5hh4eA0CCY4ID2A/JznufAWAaKkLrFCdVdDpBKIi4vVIcv8xFkdEvEgPAgEAqACZKfAe3fc7o5fZocyPugvR+OsswGb3QjH6fknQhn3gt1pD+jEOZqI14ebX8qh+IsB87sT4JoPCJn5RDIyCE0kPlwKtL2P8MH8VfHD4PEGY3XBIbBfRV+fL5yg+ErmBkFTJZFAqNYDkkpjZ2hfjwW70fEK8JWZgXLsgiFo4jGY3A4zLBaTZqVSxQsUbQCYwYrCRAFETaLBQInQJJlKIqCmBxBJBXSFDULFtFICslYCuUSh4awgEusPvhFMyycAAvPaU4XWT3jeCHObObs/WLV7QfKqoGySsBdCdXmNFwguiYgCmC4DxjqATPUk7EGZnMjz4q3BmpZBeCuguqpzHgYZropMpiRfmC4FxjsAUOyxhEPxmxuZitUTxVQVgV4KqG9I3q8C0ZjQjwTw71gRsg7QeTRPes/Uom3B95qwEPeiYrMB2kxtGgITLAvI4ehboDsVUXWbut8Af87Mn6eixVmK/6+sgHvcht4DHsaj5lTwADSqoqeVALPxQew3ZqAr9IDjmc0VzJRwsSVrMhKRvEy5L+ZL5ZUUkY8JMEu2lHh84I3sUjGZaTiEngzgwQTQVKOa+fBxGrWbFRZRvzoCKpjPKzgUGeyYpnbC/AMoqqMeJq4s4GysiqUVbTCWtUMtrwu86FQzI24hgInwQx2gRk4OXuUMTlSKK8FfHVQfbUA2WCKvRE39WAX2MApoP+EdqwwK5pogUreBSIHXw1U4u4v9kYsscAp7QfkvSDHC7OhkWOW8lqo3lqAvB/ErV/MjcT5nJED+S9RykXQHg/14fqO18bl5I6yMny6fCEWW3yGczpjCjghy+hIRbFHjuOAEscxKQyH2wxXmQUcR1SmCo4VkIxLkGQJZqugnesSC5hEOadiKqSUCofTArNFgCKriISTmgJnRCljATOcdjZM/puIxtHdFdBcxsTFoIYkLLG4kHCwGOJkEhYFReXgsfqxpnYtLl+wGfZCuNLyKeJYGEzgJNDXCabvOECCikqtEfe+vwGqvx4gm36JNoa4pvuPgyGKmCiAUmy+2nOyKBbrago4MoEuYOA40HcCTLB/ChRmeAjHa3JARQPU8vrMeW4pNhLQNXBCeye0/Sk+c0cGT4f7cW17piLRhe1zPje+XnMxhNMBvUZCPWMK+Hgyij8k+3DCq4Ix8ZATJAaPg8nOAJyCtJKGmbUgOJRAWk6josIFSZU0K1hW0hA4EVbBpkUVK+S8NxPPipSc1CznzBUnRnNPpxIyjnf2w2rj4PPZIfAskok0YjEZTqcVvImHyJs05Z5MpoGgBX9z+cdR6ago2XSXDHHB9XSA6W0HyHlZkTfV3whUNwMVjVDN9iLnNgf2FAVMXwfQewxMb0fxB3GRyNjKJqCyGahsglrsHqAcRKEF1/UeA3qOgek7lsvImelLAgorm6FWNmqeoNnUGBLX0nMM6OvIHKMVuB3r6UNr31gLmGUYfKPCjy8U4PyXLHlGFDBxMe9LhPALqRthHwuzaIbP7tXC4MPk/BaSpoAFRkRwKI60LKGy0g2O4ZFMpZBQ4pkbDJqCzShikRW1wKuknERcimnWMrGQLSI5K2TQ3TUEi1mEv8wKhSPnvrI2liUh+Kpy7oxZYmCOluGuS+6E115W4MfCgOnCQ2B62sF0H80EbxVTI27m6hagui2z6c+mzX48nIkLjsiipyMT6V5MzWzTZKFWtpS050EXpOTmRC+RQzvQdbT43NMkoK2qFWpVC+Ay3g2qCzODOjHkmKa7Heg+CmZgeqmPic0VDsZw7FAv0qnM9Va704KWhdUQxNFHiX2dPageyeRhPr9d7nDiC+UNuMbZbNCKR5OdEQVMEm28GQvhf6Kn0Csm4CvzoKq8HLFYEikpBdakQGUl8IyA8EgK0VgMXq8LHHgMh0La34nlShQ5aeSrhZz1CmzGTU2UMDk3HhqIgIUAl9OGUDAOwcTB63EArIqklNAUusiLWlR1WkohEo0jEkxgTcUG3Ljm3XCSsP3Z0qJBMN1HwJBSk6crcMzo0mraoFTPA4gCnmuNBM9psjgMJGMzunqVXEepnQe1ui0T0DPXWk8H2O4jwOkSrDO6fBJBXnNaFo4SOGfPJ1hyWnsfmK4jmpuaNBJUGxyMIR2Nw+KywuayaLFBFzZZVtB1uBf7Xz6EMimMtMJoR42y2YI0LyCYUsGbBKy5eB5qmjIfNLv7BrCqZ+sYWp/wefFPlWvg4QsT5FlwBUzimHtSSTydDmKHOQKIMtx2p5ZsY3g4ooHOWRSYrbx2fguJxeBgBCniGoaKWDKOsjInKsq9kNU0IvEoGJVY0SJ4IaOAUxI5K1YQDSdw6sQwPE4HeJ6Hv9yt0U1LaUQTMciKCofVBqvJing8ha5TAcgp4Mq2K3D9qi1wW50l64Ke8N0ID4Elm83JgzNihWlnWXULtI3G8Ctc+dwgjKA1cFL7IGK6DmUSUBSyEe9D7Xygbn7mXHGuN7L5E1nMhGuaxJrULYBC5EGudc3llkyAOXUQJ59+Bvue2Aprbw+4YEjbK9i6SjDeMqhWKxRRhN1JYoZsOPH6IeDoCXCTXH1i7Dak62vAlnlQ0+zHiz09+Kjv1Bik/7WqFp+vWF0wCRRcAacUGbuSETwpxqBW8tr5LXEFE3dyIpHWrFiZS2XOcQGInAmyoiAeT2iR0ERRsmkBNpsJaTaFkeEwWJlHuc8N3sJqFnQ4mADDqgCnor8nBK/Hpf3dJIqQ1DQSqQQGB8NIpyV4vHZNCROlLEkybIIDlqgP71tzI+q8VeBmq1s0cAosUcKnc38b/sQRt1r9Iqi1C4vjCpHhC9Y/gfbVf+IAmP7j+gdNoyeJaFbrFwK1C6ZBZRYOTSXBnHxL+ynUcQ35CNJkkeNHENk3X+96Bju6nsPJ4FGU26rR6FmEy5tugNdSWdLC2XP/zxB8+CGwfZOcDYsCmAofEE1AHdJ/DZO1mBFsbMYflwi4nx99PcrO8ni4fh7e6W4rGH4zo4BjQTzFhaH4rYgrSbA8B7NZABQGnCJo57NDsSEkEylYLWbNdawysnZGLKcUCFEeqXQKw1IUUlyC3+qE1+fBiBLDUDSE4YEowKhgeQaiyKOqwqedBZMALoWRIKkpzd3N8awWeMUxLDiORTqpQE2z8KEWH9xwG2q9VRkrfBY3hmz8xw9k7usZ0UiCAKJ4GxYB7hK4SmQEBnpoJmJgTuwHkYdRQXNaZrD6JVAbF2kZkWgbHwEtUvrMe2FQwhvtLjt5L+oX6csMdppVonj39G3FU0ceQV90rAUnsCIuabwOVzXdDLOQuaLUEz2O9pHd6AjuQ0yKwCV6cdO8v9WSGxVbi53qwvbrbgBvYPa/0JIa3LhMRYpckTqvvdtVhq9VLcQic+G8EAVXwOTclpQPfCkawB4mhh5ehq3MAr/Xq1myQ8EQJElCMBZCJBaFxWTOXDNiZLAqA5/JjGXV5SCW9KGhEKRkGmtq62AWTHjtWCd64mHNSiZnwG6PFQ6HFSbOjFg4rZ39ihZGo6XdKVZUDAyEtGQe5JpTaCSBdFxFq2s+bt1wE+q9NbNeAWvPHwnUOr4XTOf+/CYvIIkaGpdkNhna9CFArml07tfOiPPaSIBV41Lqbs4BVM0SPrYvk2AlX424/sk70bgYIBmrcmxPt/8vnjjyUNZRV7XcjKtbbsafjv0cx4KZCnfntyvrb8JS30VZ6RSyQ/BkFw5853tQ/vg7w6ZleA5f/EALtiXHXoH6lqMeETECXmaxuqwKa201cHEmw3ghhAuugM+sJpBK4JnEIHa607CUmTKpJlVBq/ULlUEsHQPLMYhHJQwGwghFwhAFDpcsqMXqJj9OjkRwaDiEVCyFtTU18DrseO14F3qSUQwNRSGYWO1escDxkNMMklEJookk4lfAicTyVbTz5sBAGJVuPzgLud4kwcxbEA7IuKb1GlzctkGL0J4rTbOGj+0BSHan6baGJVCalhZPdp7prqeQ40le8M59YDr3TDsPuEoSNTQthdqwFCB5ymnLDQGSda5zL5hjmao102kkVSTIR1DjkimT2d71LP5n739mHV9hq8Vlre/Gqz1PjNvXY/LjQ4u/pN0QKYYmp9L41S0fQd1QF9Cbxw+eCxb37LsW4mvWsS5rkmlx22tArKMHnCiAq/Yj5QSkBRWo8NagrcoPgeiPPLcZU8AD6SSeTQ7hgIeB6LJgODyEeCKJco8PDpsNsTRxI2dWGwxGEArFYDKxmOd3osIh4sRgGP0JCWxKwZraClS4iQLuRW8qgVg0jUgkrp0Tc0KmgAOjakkmEY3E4fO5tatOpGKSxWKCRcgkJc/cLxYQCki4uukaXDJvIywkSnQuteE+MB27tUCIKTWbE0rTcoD86Em6P6VJ5sYg7ZpM+y4ty9lUmkrSRTavgFpTuDOtqfBZCmOYY7u190IryjGVRqL+m5dnUttOo3UMH8B3t92ji8L6pivRE+2csO972/4adY7ieDba//wX7H/wV/Buf0HX2qbSabjBg1svsiBxgeuZ0NrM2vGPj7SPWyLXUlkGtboWrZcugacqvzdjZkwBx2UZ+2NBvK6EEbIx6A0GEYcCV10ZHHabZp0qSqbE4HAwrAVJ2e0mWBkVXguPVIrBUEqCkpSxrq4Sfo8NWzt70Z9OgOcFHG8fgJrKVAMURAblFV7N8h0cDMEsmJFMpyCaOVjNFjgtDnAcj6QURyKZRG9XENcvfhcumbcJXrtnbrihz3+iUwkw7buAjl1gSDEIvc1XC6V5BVBVmDt0etkq6X6hANiOXQA5p8+hqSTSnMiC5GqmLT8I9HZmZJHLfVWO0+SgySIPmfVeP/4qfnnw36Co58q4TrS4FfUbMZSY2Ju1uuIKXFJzfX6wmSaVJz77FTj6usHs3DZNSuMPZzgW93ygFa+lxs++9TdRO2589Oikc5vLnGi79Wq46/N3RjxjCpisVFZVnEpE8Vp8BKc4BX1MAkGzCpOFh8jysAsCwKQwGIwiySiaS9kDDm0eJxSVQXsogmAohjV1FXDZTHi5vQe98ThETkA8LMHCq3CQKmiiCIWxI8GmMteToknwPAeTRdDuCrttLq0PuT8ciYeRiMuoslXjiuYrcemCjXPKDX3+E6i5QY/u1BUUpEVztq6iLmcjto90AszRN4Gjb2TqSE/WyBlj60qgdRW0O7605RcBUn3pyBuZSOlsjZQnJXJoWpatp+6/H+k/ij/ufwinkjuzjplfvQxx6VxxkL0DbiwtP2fBL/aux9UNt2alY3SHZCiCX9/6UTSQ8/YL6vPma+4X370Yf28Zv/wgmePrg3Zc9OfJFTDpZ3LasOD2LXBW5ydJ04woYHIXOKnICMsSDsZDeAURJCsdSDAphKNRRGJxWDkR831e1HpNCCXS6AxFEFFSaHE7sLKmHIOhJPYNDmmu6VU15WBYDjtODaA3HEUkmIRLMGNBmxPuMg6DQ0mc7E0inpbhcTrBCwzSKRmheByDgRC8PidYloHKKjCZOXAcp9GoFVpx87obUO2ugsNim3uWMDkhIlmbju6cNF2c9oXftjovX/j5euFmIx3taODITiARGX95JqsmB7Vl5WxcftGsScvedGQnmKNvTMgTqU6ktqwCDHD/R1NhfOOljyJOjukmaORMs768RbvlcabtC/iwxHeufOYK/6W4rPY9M47rgd/8Eb1PPQvTi09PmRer1wmn1wlWUbUKdwrHQmKA2EgU/V4r3rNcGdf1fGbCrwbtuPJP2RUw6c+ZBNS+5yrUr5j+/fmCKGBi6XKn6+aSLFi9qTiOSjGcRAxHkxEEHAz8Nd6zAQEyUc6RKEjuq+U1XvidVhzqG8HeniEsrHRhVb0fp4bi2Ns/CEaSsKLai+G4goMjQUi8gnB/As0eK3x+E1QWONg+hHBSgpUVUG53wCTw6OwbQnckBLvLiuqq8owCziTBRDAURaA3jHKHH4srF6Pc4sel8y+Cf65ekicVfsjG33fBeRK5YtS2Fur8NcAsv6415Z0hzwO1ZBGHd2TqEp/f7B6obWsyd0ppKwgCRA7Mke0AKTJwfiuvhzpvNdQ8528mNzu6Ix0w8VY8suebWva/SDKE/sjY60g20QHvBccPTq4JIflcDuz1VW/DxqotBcFqskn+eNdn4Tu0G0pf7pWSeJsN/rZmCJ0dE04R81jwfzdV4GfKxBbwRxNOvP93h3VjUbZqARa/b7Pu/hN1LIgCjsgS7KSih6qiX0rhmeQgDohxxCwqYrGUlpHK5bGBFzhIaRmCyIPhSXnBNDzgsazGi0gqjV0nBtHkd2JprRsHTg1jb88wFlS4sbLeh+3tARyNhLVqSNWCFSvq/OAEFaEYg617T4C3pjG/1oOGMjcGR9I4PDCCMCeDFwVIyUzhIKvNBJlJIZIIQ5JU2IhFobDo7wrixmU34drlV8y+zFg6HyFS9Jw5vF3L2UqaSg7X563NuJ1pKygCxCvBHH79XLQ6qSA1f20mnSRtBUWAad+dkcXp0pNa8YR5a/NePpNk+Ptjx49xPDQ2OLJMrMCuU6PTKrosPrgcrtFYpBhAPGcRX9dyJ1pcSwuK14WTRfr68Zcv3ouybbkHX/EuJyrtZnBRfTW497Z58UirFX9gw4hfcJQzj7Pgh48ch6rTBc6bRdTccAXqltdPSycURAEPSkl4eZN28XlHMohHhSC4cl7L65lKKBgaDGuLID8kS5WnzA6rTdSKMKTDKdTazPC6RRzqCsFlFlHlMeFQ9wj6hhK4fEkDljeW4+ldnTgajMAhilhb70dbtReptIITvSl0DvRBcKVgMfMwq1acCkgIKxI4KynmwGkpMFmVh8vhAAQJcTkGmdQPjqSRTKUxHIjispYr8PEr79Aiqedq0yqYHHo9U+t2wXqoJKqTthlBgJRzYw5t0yL8MX99ppgFbTOCALmixBzeBpRVQZm/Pu/pJEnyjd8e/R5OhSd2kf...";

        //
        define('UPLOAD_DIR', __DIR__ . '/../data_images/gift/');
        
        $pic = str_replace('data:image/png;base64,', '', $pic);
        $pic = str_replace(' ', '+', $pic);
        $data = base64_decode($pic);
        $fileName =  uniqid() . '.png';
        $fileDir = UPLOAD_DIR . $fileName;
        $success = file_put_contents($fileDir, $data);
        // print $success ? $fileDir : 'Unable to save the file.';

        //查詢收禮者的客戶編號
        $searchSql = "select cus_no
                        from customer
                        where cus_email=:email";
        $member = $pdo->prepare($searchSql);
        $member->bindValue(":email", $reciveCusEmail);
        $member->execute();
        $memberRow = $member->fetch(PDO::FETCH_ASSOC);
        $owner = $memberRow["cus_no"];

        $money = intval($money);

        $insertSql = "insert into giftcard(owner,
                            giver,
                            giftcard_pic_url,
                            giftcard_money,
                            giftcard_balance,
                            giftcard_purchase_date)
            values (:owner, :giver, :picUrl, :money, :money, current_date())";

        $order = $pdo->prepare($insertSql);
        $order->bindValue(":owner", $owner);
        $order->bindValue(":giver", $cusNo);
        $order->bindValue(":picUrl", $fileName);
        $order->bindValue(":money", $money);
        $order->execute();
    }

    // echo json_encode(["訂單完成！"]);
} catch (Exception $e) {
    // echo "連線失敗";
    echo json_encode(["Something went wrong...!We're truely sorry QQ"]);
    // echo json_encode([$e]);
}
?>