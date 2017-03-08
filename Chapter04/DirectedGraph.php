<?php
require_once __DIR__ . '/../lib/StatefulGraphNode.php';
class DirectedGraph {
    /**
     * find if there are routes between two nodes
     * @param  StatefulGraphNode $start the start node
     * @param  StatefulGraphNode $end   the end node
     * @return boolean                  true if route exists
     *                                  false if not.
     */
    public static function routeExists($start, $end) {
        if ($start == $end)
            return true;
        $queue = new SplQueue();
        $queue->enqueue($start);
        while (!$queue->isEmpty()) {
            $curr = $queue->dequeue();
            if ($curr == $end)
                return true;
            foreach ($curr->getConnectedNodes() as $connectedNode) {
                if ($connectedNode->getState() == StatefulGraphNode::UNVISITED) {
                    if ($connectedNode == $end)
                        return true;
                    $connectedNode->setState(StatefulGraphNode::VISITING);
                    $queue->enqueue($connectedNode);
                    $connectedNode->setState(StatefulGraphNode::VISITED);
                }
            }
        }
        return false;
    }
}



// for ($i = 0; $i < 7; $i++) {
//     $n[] = new StatefulGraphNode($i);
// }
// 
// $n[0]->addNode($n[1]);
// $n[0]->addNode($n[3]);
// $n[0]->addNode($n[4]);

// $n[2]->addNode($n[5]);
// $n[4]->addNode($n[6]);

// if (DirectedGraph::routeExists($n[0], $n[5]))
//     echo "true\n";
// else
//     echo "false\n";
