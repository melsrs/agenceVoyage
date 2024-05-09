import "./voyageList.css";
import VoyageCardTeaser from "../voyageCardTeaser/VoyageCardTeaser.js";

export default function VoyageList(props) {
  return (
    <div>
      {props.voyages && (
        <ul className="voyageList">
          {props.voyages.map((voyages, index) => (
            <Link key={index} href={"/voyages/" + voyages.id}>
              <li>
                <VoyageCardTeaser
                  name={voyages.nom}
                  pays={voyages.pays}
                  image={voyages.image}
                />
              </li>
            </Link>
          ))}
        </ul>
      )}
    </div>
  );
}
