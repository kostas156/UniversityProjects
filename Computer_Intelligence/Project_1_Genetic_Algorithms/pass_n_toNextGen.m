function [a] = pass_n_toNextGen(population, numOfpass, fit)
    if nargin<2
        fit = fit_co(population);
    end

    a = nan(numOfpass, size(population,2));

    sortedFit = sort(fit);
    sortedFit = sortedFit(end-numOfpass+1:end);
    for i=1:numOfpass
        index = find(fit==sortedFit(i));
        temp = population(index(1), 1:end);
        a(i, 1:end) = temp;

    end
end
