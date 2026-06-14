function [parent1, parent2] = myRouletteSel(popArray, fitList)
    if nargin<2
        fitList = fit_co(popArray);
    end
    
    tot_fitness = sum(fitList);
    prob_list = fitList./tot_fitness;
    
    parentIndex1 = randsample(1:length(prob_list), 1,true, prob_list);
    parentIndex2 = randsample(1:length(prob_list), 1,true, prob_list);
    while (parentIndex1==parentIndex2)
        parentIndex2 = randsample(1:length(prob_list), 1,true, prob_list);
    end
    
    parent1 = popArray(parentIndex1, 1:end);
    parent2 = popArray(parentIndex2, 1:end);

end
 