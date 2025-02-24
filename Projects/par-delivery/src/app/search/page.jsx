import { SideBarProvider } from "@/context/SideBarContext";
import RootLayout from "../layout";
import { SearchPanel } from "@/components/searchPanel/SearchPanel";
import { HeaderTwo } from "@/components/header/header";
import LayoutMain from "@/components/layoutMain/LayoutMain";
import CartCard from "@/components/CartCard/CartCard";
import { HeaderLeftNav } from "@/components/header/HeaderSidebarBtn"

const Search = () => {
  return (
    <SideBarProvider>
      <HeaderLeftNav />
      <LayoutMain>
        <HeaderTwo nav="no"></HeaderTwo>
        <SearchPanel />
        <CartCard />
      </LayoutMain>
    </SideBarProvider>
  );
};

export default Search;
