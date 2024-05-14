"use client"

import "./voyageList.css";
import VoyageCardTeaser from "../voyageCardTeaser/VoyageCardTeaser.js";
import Link from "next/link";



export default function VoyageList(props) {
  return (
    <div>
      {props.voyages && (
        <ul className="voyageList">
          {props.voyages.map((voyage, index) => (
            <Link key={index} href={"/voyages/" + voyage.id}>
              <li>
                <VoyageCardTeaser
                  nom={voyage.nom}
                  pays={voyage.pays}
                  image={voyage.image}
                />
              </li>
            </Link>
          ))}
        </ul>
      )}
    </div>
  );
}
