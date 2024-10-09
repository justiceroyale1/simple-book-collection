
const useHelpers = () => {
    const getStatusBagde = (status: string) => {
        switch (status) {
            case "borrowed":
                return "badge-warning";
            case "reserved":
                return "badge-info";

            default:
                return "badge-success";
        }
    };

    return {
        getStatusBagde
    }
}

export default useHelpers
