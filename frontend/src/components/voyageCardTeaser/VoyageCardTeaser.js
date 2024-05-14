"use client"

import "./voyageCardTeaser.css";
import Image from "next/image";

export default function VoyageCardTeaser({nom,pays,image}) {
  return (
    <div className="voyageCard">
    <div className="voyageCardInformation">
      <p className="voyageCardName">{nom}</p>
      <p className="voyageCardPays">{pays}</p>
    </div>
    {image && (
      <img
        className="voyageCardImage"
        width={250}
        height={250}
        src={image}
        alt={"Image de " + nom}
      />
    )}
  </div>
  );
}
